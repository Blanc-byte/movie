<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Trainer;
use App\Models\Actors;
use App\Models\Movie;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log;

class adminController extends Controller
{
    public function home()
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
        
        return view('admin.home', compact('movies'));
    }
    public function customers()
    {
        $userId = auth()->id();

        $customers = DB::select("
            SELECT m.name, m.description, m.genre, m.day_film, m.time_film, p.number_of_tickets, 
                   p.total_price, a.actors, p.date_purchased ,m.img_url
            FROM movie m
            JOIN purchase p ON m.id = p.movie_id
            JOIN users u ON u.id = p.customer_id
            JOIN actors a ON m.id = a.movie_id ORDER BY p.date_purchased DESC
        ");
        
        return view('admin.customers', compact('customers'));
    }
    public function remove()
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
        )->where('status', '0')
        ->get();
        
        return view('admin.remove', compact('movies'));
    }
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'img_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'genre' => 'required|string|max:100',
            'tickets' => 'required|integer|min:1',
            'day_film' => 'required|date',
            'time_film' => 'required|date_format:H:i',
        ]);

        // Handle file upload
        if ($request->hasFile('img_url')) {
            $imageName = time() . '.' . $request->img_url->extension();
            $request->img_url->move(public_path('images/movies'), $imageName);
        }

        // Store the movie details in the database
        Movie::create([
            'name' => $request->name,
            'description' => $request->description,
            'img_url' => 'images/movies/' . $imageName,
            'genre' => $request->genre,
            'ticket' => $request->tickets,
            'day_film' => $request->day_film,
            'time_film' => $request->time_film,
        ]);

        // Redirect or return response
        return redirect()->back()->with('success', 'Movie added successfully!');
    }
    public function delete($id)
    {
        $movie = Movie::findOrFail($id);
        
        $movie->update(['status' => 0]);
        
        return redirect()->route('home', $movie->id)->with('success', 'Movie deleted successfully!');
    }

    public function addAgain($id)
    {
        $movie = Movie::findOrFail($id);
        
        $movie->update(['status' => 1]);
        
        return redirect()->route('remove', $movie->id)->with('success', 'Movie deleted successfully!');
    }

    public function details($id)
    {
        
        $movie = Movie::with('actors')->findOrFail($id);

        return view('admin.edit', [
            'movie' => $movie,
            'actors' => $movie->actors // This will return the list of associated actors
        ]);
    }

    public function update(Request $request, $id)
    {
        //dd($request->actors);
        $movie = Movie::findOrFail($id);

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'img_url' => 'nullable|url',
            'genre' => 'required|string|max:100',
            'ticket' => 'required|numeric|min:0',
            'day_film' => 'required|date',
            'time_film' => 'required|date_format:H:i',
            'actors' => 'required|string',
        ]);

        $movie->update($validated);

        // Update or create the actors record
        Actors::updateOrCreate(
            ['movie_id' => $movie->id], // Match by movie_id
            ['actors' => $request->input('actors')] // Update the actors string
        );


        return redirect()->route('home', $movie->id)
            ->with('success', 'Movie updated successfully!');
    }



    // public function update(Request $request)
    // {
    //     // Log::info('Request Data:', $request->all());
    //     $movie = Movie::find($request->id);
    //     // dd($request->id);
    //     dd($request->name,$request->description,$request->genre,$request->ticket,$request->day_film,$request->time_film);
        
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'genre' => 'required|string|max:255',
    //         'ticket' => 'required|integer',
    //         'day_film' => 'required|date',
    //         'time_film' => 'required|date_format:H:i',
    //     ]);
    //     $movie->name = $request->name; 
    //     $movie->description = $request->description; 
    //     $movie->genre = $request->genre; 
    //     $movie->ticket = $request->ticket; 
    //     $movie->genre = $request->day_film; 
    //     $movie->ticket = $request->time_film; 
    //     $movie->save();
    //     // Debugging
    //     // Log::info('Validated Data:', $validated);
    //     // $movie->fill($validated)->save();

    //     // if (!$updated) {
    //     //     Log::error('Movie update failed.', [
    //     //         'movie_id' => $movie->id,
    //     //         'data' => $validated,
    //     //     ]);
    //     // }
    //     return redirect()->back()->with('success', 'Movie updated successfully!');
    // }

    
}
