<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Message;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list messages', ['only' => ['list']]);
    }

    public function list()
    {
        $title = 'List Messages';
        $messages = Message::paginate();

        return view('backend/messages/list', compact('title', 'messages'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'message' => 'nullable|string',
        ]);

        $message = Message::create($validatedData);

        if ($message) {
            return back()->with('success', 'Message Sent.');

        } else {
            return back()->with('error', 'Message could not sent.');
        }

    }
    public function delete(Request $request)
    {
        Message::where('id', $request->message_id)
            ->delete();

        return redirect()->route('messages.list')->with(
            'success',
            'Message has been deleted.'
        );
    }

}
