<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\League;
use App\Models\Club;
use App\Models\News;
use App\Models\Player;

class Admincontroller extends Controller
{
    // Category
    public function view_category()
    {
        $data = Category::all();
        return view("admin.category", compact("data"));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;
        $category->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Category add successfully!");

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Category delete successfully!");

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view("admin.edit_category", compact("data"));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Category edit successfully!");

        return redirect('/view_category');
    }


    // League
    public function view_league()
    {
        $category_list = Category::all();
        $data = League::all();

        return view("admin.league", compact("data", "category_list"));
    }

    public function add_league(Request $request)
    {
        $league = new League();

        $league->league_name = $request->league;
        $league->category_id = $request->category_id;
        $league->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("League add successfully!");

        return redirect()->back();
    }

    public function delete_league($id)
    {
        $data = League::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess("League delete successfully!");

        return redirect()->back();
    }

    public function edit_league($id)
    {
        $category_list = Category::all();
        $data = League::find($id);

        return view("admin.edit_league", compact("category_list", "data"));
    }

    public function update_league(Request $request, $id)
    {
        $data = League::find($id);
        $data->league_name = $request->league;
        $data->category_id = $request->category_id;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("League edit successfully!");

        return redirect('/view_league');
    }

    // Club
    public function view_club()
    {
        $data = Club::all();
        return view("admin.club", compact("data"));
    }

    public function add_club(Request $request)
    {
        $club = new Club;

        $club->club_name = $request->club;
        $club->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Club add successfully!");

        return redirect()->back();
    }

    public function delete_club($id)
    {
        $data = Club::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Club delete successfully!");

        return redirect()->back();
    }

    public function edit_club($id)
    {
        $data = Club::find($id);

        return view("admin.edit_club", compact("data"));
    }

    public function update_club(Request $request, $id)
    {
        $data = Club::find($id);
        $data->club_name = $request->club;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Club edit successfully!");

        return redirect('/view_club');
    }

    // Player
    public function view_player()
    {
        $data = Player::all();
        return view("admin.player", compact("data"));
    }

    public function add_player(Request $request)
    {
        $player = new Player;

        $player->player_name = $request->player;
        $player->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Player add successfully!");

        return redirect()->back();
    }

    public function delete_player($id)
    {
        $data = Player::find($id);
        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Player delete successfully!");

        return redirect()->back();
    }

    public function edit_player($id)
    {
        $data = Player::find($id);

        return view("admin.edit_player", compact("data"));
    }

    public function update_player(Request $request, $id)
    {
        $data = Player::find($id);
        $data->player_name = $request->player;
        $data->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("Club edit successfully!");

        return redirect('/view_player');
    }

    // News
    public function add_news()
    {
        $player_list = Player::all();
        $league_list = League::all();
        $club_list = Club::all();
        return view("admin.add_news", compact("player_list", "league_list", "club_list"));
    }

    public function view_news()
    {
        $datas = News::paginate(5);

        return view("admin.view_news", compact("datas"));
    }

    public function upload_news(Request $request)
    {
        $news = new News;

        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->club_id = $request->club_id;
        $news->player_id = $request->player_id;
        $news->league_id = $request->league_id;
        $image = $request->file('image');

        if ($image) {

            $image_name = time() . "." . $image->getClientOriginalExtension();

            $request->image->move('news_image', $image_name);

            $news->linkimage = $image_name;
        }

        $news->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("News add successfully!");

        return redirect()->back();
    }

    public function delete_news($id)
    {
        $data = News::find($id);
        $imagepath = public_path("news_image/" . $data->linkimage);
        if (file_exists($imagepath)) {
            unlink($imagepath);
        }

        $data->delete();
        toastr()->timeOut(10000)->closeButton()->addSuccess("News delete successfully!");

        return redirect()->back();
    }

    public function edit_news($id)
    {
        $data = News::find($id);
        $player_list = Player::all();
        $league_list = League::all();
        $club_list = Club::all();
        return view("admin.edit_news", compact("data", "player_list", "league_list", "club_list"));
    }

    public function update_news(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->author = $request->author;
        $news->club_id = $request->club_id;
        $news->player_id = $request->player_id;
        $news->league_id = $request->league_id;
        if ($request->hasFile('image')) {
            $image = $request->image;


            $image_name = time() . "." . $image->getClientOriginalExtension();

            $request->image->move('news_image', $image_name);

            $news->linkimage = $image_name;
        } 
        $news->save();
        toastr()->timeOut(10000)->closeButton()->addSuccess("News edit successfully!");

        return redirect('/view_news');
    }

    public function news_search(Request $request)
    {
        $search = $request->search;    
        $datas = News::where('title','LIKE','%'.$search.'%')->paginate(5);

        return view('admin.view_news', compact('datas'));
    }
}
