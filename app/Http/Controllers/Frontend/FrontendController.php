<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function about_the_journal()
    {
        return view('frontend.aboutTheJournal');
    }
    public function call_for_paper()
    {
        return view('frontend.callForPaper');
    }

    public function editorial_Board()
    {
        return view('frontend.editorialBoard');
    }

    public function archieve()
    {
        return view('frontend.archieve');
    }
    public function archieve_article()
    {
        return view('frontend.archieveArticle');
    }
    public function article_details()
    {
        return view('frontend.articleDetails');
    }

    public function browse_article()
    {
        return view('frontend.browseArticle');
    }

    public function for_authors()
    {
        return view('frontend.forAuthors');
    }

    public function contact_us()
    {
        return view('frontend.contactUs');
    }
}
