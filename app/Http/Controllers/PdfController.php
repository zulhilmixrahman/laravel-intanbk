<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{

    public function using_controller()
    {
        $html = "<table>
            <tr>
                <td>#</td>
                <td>Negeri</td>
                <td>Tarikh</td>
            </tr>
            <tr>
                <td>#</td>
                <td>Melaka</td>
                <td>10</td>
            </tr>
            <tr>
                <td>#</td>
                <td>Selangor</td>
                <td>4 Mei 2019</td>
            </tr>
        </table>";

        // Generate to PDF
        $pdf = \PDF::loadHTML($html);
        return $pdf->stream();
    }

    public function using_view()
    {
        $posts = \App\Post::all();

        // Generate PDF from {view}.blade.php
        $pdf = \PDF::loadView('pdf.post', compact('posts'));
        return $pdf->stream();
    }

    public function test_mail()
    {
        \Mail::send('email.test', [], function ($message) {
            $message->from('john@johndoe.com', 'John Doe');
            $message->to('ahmad.zulhilmi.89@gmail.com', 'John Doe Zul');
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            // $message->replyTo('john@johndoe.com', 'John Doe');

            $message->subject('Test Email');
        });
     }
}
