<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    private function uploadImage($image): string
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/client'), $imageName);
        return $imageName;
    }
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index',compact('clients'));
    }

    public function create()
    {
        return view('admin.client.create');

    }
    public function store(Request $request)
    {

        $request->validate([
            "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ]);

        try {
            $clients = new Client();
            $clients->fill([
                "name" => $request->input("name"),
            ]);

            if ($request->hasFile('image')) {
                $clients->image = $this->uploadImage($request->file('image'));
            }



            $clients->save();
        } catch (QueryException $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with("error", "QueryException code: " . $exception->getCode());
        }

        return redirect()->route("clients.index")->with("success", "clients has been inserted successfully.");

    }

    public function edit (Client $client)
    {
        return view('admin.client.edit',compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        try {
            $client->fill([
                'name' => $request->input('name'),
            ]);

            if ($request->hasFile('image')) {
                // Optional: পুরানো ইমেজ ডিলিট করতে চাইলে এখানে কোড দিন
                $client->image = $this->uploadImage($request->file('image'));
            }

            $client->save();

            return redirect()->route('clients.index')->with('success', 'Client updated successfully.');

        } catch (QueryException $e) {
            return back()->withInput()->with('error', 'DB Error: ' . $e->getCode());
        }
    }


    public function destroy(Client $client)
    {
        try {
            if ($client->image && file_exists(public_path('uploads/client' . $client->image))) {
                unlink(public_path('uploads/client' . $client->image));
            }

            $client->delete();

            return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
        } catch (QueryException $e) {
            return back()->with('error', 'Database error: ' . $e->getCode());
        }
    }

}
