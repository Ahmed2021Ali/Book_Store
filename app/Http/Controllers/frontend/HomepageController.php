<?php

namespace App\Http\Controllers\frontend;


use App\Models\FAQ;
use App\Models\Book;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Branch;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;


class HomepageController extends Controller
{
    public function index()
    {
        $offers=Book::where('status',1)->orderBy('offer','desc')->limit(10)->get();

        $newly=Book::where('status',1)->latest('id')->take(10)->get();

        $sliders=Slider::where('status',1)->get();

        $banners=Banner::where('status',1)->get();

       $bestseller = Book::where('stock',1)->where('status',1)->get();

    return view('frontend.home.index',compact('banners','sliders','offers','newly'  ,'bestseller' ));
    }

     public function show_book( $encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $books=Book::select('title','id','author_name','price','price_after_offer','image')->where('status',1)->where('category_id',$id)->paginate(8);
        return view('frontend.shop.index',compact('books'));
    }

    public function Show_all_Books()
    {
        $books=Book::select('title','id','author_name','price','price_after_offer','image')->where('status',1)->paginate(8);
        return view('frontend.shop.index',compact('books'));
    }

    public function single_book($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $FAQ=FAQ::where('status',1)->get();
        $book=Book::where('id',$id)->first();
        $category_books=Book::where('category_id',$book->category_id)->take(4)->get();
        return view('frontend.single-product.index',compact('book','FAQ','category_books'));
    }

    public function branches()
    {
        $branches=Branch::where('status',1)->get();
        return view('frontend.branch.index',compact('branches'));
    }

    public function account_details()
    {
        return view('frontend.account_details.index');
    }

    public function about_us()
    {
        return view('frontend.about_us.index');
    }

    public function contact_us()
    {
        return view('frontend.contact_us.index');
    }

    public function refund_policy()
    {
        return view('frontend.refund-policy.index');
    }

    public function search(Request $request)
    {
        $search=$request->search;
           $books=Book::where(function($q) use ($search){
            $q->where('title','like',"%$search%")
            ->orwhere('author_name','like',"%$search%")
            ->orwhere('description','like',"%$search%");
           })
           ->orwhereHas('category',function($q) use ($search){
            $q->where('title',"$search");
         })->paginate(8);

         if($books->isNotEmpty())
         {
            return view('frontend.shop.index',compact('books'));
         }
         else
         {
            return redirect()->route('Show_all_Books');
         }
    }

    // محتاج تعديل
    public function selected(Request $request)
    {
        $data=$request->data;
        if($data=="للأعلي")
        {
            $books=Book::select('id','title','image','author_name','offer','price','price_after_offer')->orderBy('price', 'ASC')->paginate(8);
        }
        elseif($data=="للأدني")
        {
            $books=Book::select('id','title','image','author_name','offer','price','price_after_offer')->orderBy('price', 'DESC')->paginate(8);
        }
        else
        {
            return redirect()->route('Show_all_Books');
        }
        return view('frontend.shop.index',compact('books'));
    }



}
