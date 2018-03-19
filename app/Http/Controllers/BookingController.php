<?php
namespace App\Http\Controllers;

use App\User;
use App\Booking;
use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Hashids;

class BookingController extends Controller
{
    public function __construct()
    {

    }

    public function createBooking(Request $request)
    {
        $booking = new Booking();
        $booking->organisation = $request->organisation;
        $booking->email = $request->email;
        $booking->purpose = $request->purpose;
        $booking->date_start = $request->date_start;
        $booking->status = 0;
        $booking->save();

        if ($request->attachment) {
            foreach ($request->attachment as $attachment) {
                $attachment_new = new Attachment();
                $attachment_new->booking_id = Hashids::decode($booking->id)[0];
                $attachment_new->name = 'temp';
                $attachment_new->save();

                $filename = $attachment_new->id . '-attachment.' . $attachment->getClientOriginalExtension();
                Storage::disk('public_attachments')->put($filename, File::get($attachment));
                $attachment_update = Attachment::find(Hashids::decode($attachment_new->id)[0]);
                $attachment_update->name = $filename;
                $attachment_update->save();
            }
        }
        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Booked');
        return redirect()->route('booking', ['id' => $booking->id]);
    }

    public function approveBooking(Request $request)
    {
        $booking = Booking::find(Hashids::decode($request->id)[0]);
        $booking->status = 1;
        $booking->save();

        // todo send email

        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Booking approved');
        return redirect()->route('booking', ['id' => $booking->id]);
    }

    public function rejectBooking(Request $request)
    {
        $booking = Booking::find(Hashids::decode($request->id)[0]);
        $booking->status = 2;
        $booking->save();

        // todo send email

        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Booking rejected');
        return redirect()->route('booking', ['id' => $booking->id]);
    }

    public function getBookings()
    {
        $bookings = Booking::paginate(5);
        return view('bookings/bookings')->with('bookings', $bookings);
    }

    public function getBooking(Request $request)
    {
        $booking = Booking::find(Hashids::decode($request->id)[0]);
        return view('bookings/booking')->with('booking', $booking);
    }
}
