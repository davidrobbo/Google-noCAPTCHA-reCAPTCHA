<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TicketFormRequest;
use App\Ticket;
use App\ReCaptcha;

class TicketsController extends Controller{
	
    public function create() {
    	return view('tickets.create');
	}

	public function store(TicketFormRequest $request) {
		$slug = uniqid();
		$ticket = new Ticket(array(
			'title' => $request->get('title'),
			'content' => $request->get('content'),
			'slug' => $slug
			));
		
			$secret = 'Your secret API key goes here';
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        	$responseData = json_decode($verifyResponse);        	
	       
				$ticket->save();

		return redirect('contact')->with('status', 'Your ticket has been created! The unique id is '. $slug);
	}

	public function ticketList() {
		$tickets = Ticket::all();
		return view('tickets', compact('tickets'));
	}

	public function show($slug){
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
		return view('tickets/show', compact('ticket'));
	}

	public function edit($slug){
		$ticket = Ticket::whereSlug($slug)->firstOrFail();
    	return view('tickets.edit', compact('ticket'));
	}

	public function update($slug, TicketFormRequest $request){
	    $ticket = Ticket::whereSlug($slug)->firstOrFail();
	    $ticket->title = $request->get('title');
	    $ticket->content = $request->get('content');
	    if($request->get('status') != null) {
	        $ticket->status = 0;
	    } else {
	        $ticket->status = 1;
	    }
	    $ticket->save();
	    return redirect(action('TicketsController@edit', $ticket->slug))->with('status', 'The ticket '.$slug.' has been updated!');
	}

	public function destroy($slug){
    $ticket = Ticket::whereSlug($slug)->firstOrFail();
    $ticket->delete();
    return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted!');
	}

}
