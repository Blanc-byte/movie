<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Movie;
use App\Models\Purchase;

class customerController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function movies()
    {
        $movies = Movie::select(
            'id',
            'name',
            'description',
            'img_url',
            'genre',
            DB::raw('(CASE WHEN ticket > 0 THEN ticket ELSE "Sold Out" END) AS tickets'),
            DB::raw('DATE_FORMAT(day_film, "%Y-%m-%d") AS day_film'),
            DB::raw('TIME_FORMAT(time_film, "%H:%i:%s") AS time_film')
        )->where('status', '1')
        ->get();

        return view('customer.home', compact('movies'));
    }
    public function show($id)
    {
        $movie = Movie::with('actors')->find($id);  
        return view('customer.details', ['movie' => $movie, 'movieId' => $id]);
    }
    public function purchase(Request $request, $movieId)
    {
        $ticketCount = $request->ticketCount;
        $totalPrice = $request->totalPrice;
        $paymentType = $request->paymentType;  // Retrieve payment type from request
        $customerId = auth()->id(); 

        $purchase = new Purchase([
            'movie_id' => $movieId,
            'number_of_tickets' => $ticketCount,
            'total_price' => $totalPrice,
            'customer_id' => $customerId,
            'payment_type' => $paymentType,  // Save payment type
        ]);

        $purchase->save();
        
        $movie = Movie::find($movieId);
        $movie->ticket -= $ticketCount; 
        $movie->save();

        $movies = Movie::select(
            'id',
            'name',
            'description',
            'img_url',
            'genre',
            DB::raw('(CASE WHEN ticket > 0 THEN ticket ELSE "Sold Out" END) AS tickets'),
            DB::raw('DATE_FORMAT(day_film, "%Y-%m-%d") AS day_film'),
            DB::raw('TIME_FORMAT(time_film, "%H:%i:%s") AS time_film')
        )
        ->get();

        return view('customer.home', compact('movies'));
    }


    public function showPurchases()
    {
        
        $userId = auth()->id();
        $purchases = DB::select("
            SELECT m.name, m.description, m.genre, m.day_film, m.time_film, p.number_of_tickets, 
                   p.total_price, a.actors, p.date_purchased ,m.img_url
            FROM movie m
            JOIN purchase p ON m.id = p.movie_id
            JOIN users u ON u.id = p.customer_id
            JOIN actors a ON m.id = a.movie_id WHERE u.id=? ORDER BY p.date_purchased DESC 
        ", [$userId]);
    
        return view('customer.mypurchased', compact('purchases'));
    }
    public function location()
    {
        
        return view('customer.location');
    }
}
