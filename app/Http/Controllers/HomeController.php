<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Auth;
use DB;
class HomeController extends Controller
{
    //

    public function home(){
        $data['categories'] = Category::where("parent_id",NULL)->get();
        $data['products'] = Product::all();

        return view("core.home-page",$data);
    }

    public function search(Request $req){
        $data['categories'] = Category::where("parent_id",NULL)->get();

        if ($req->method() == "GET" && $req->search != ""){
            $search = $req->search;
            $data['products'] = Product::where("title","LIKE","%$search%")->get();

            return view("core.home-page",$data);
        }
        else{
            return redirect()->back();
        }
    }

    public function checkCode($code){
        $c = Coupon::where('code', $code)->first();
        return $c;
    }

    public function addCoupon(Request $req){
        $user = Auth::user();
        if($req->method() == 'POST'){
            $code = $req->code;

            $check = $this->checkCode($code);

            if($check){
                $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
                if($order){
                        $order->coupon_id = $check->id;
                        $order->save();
                }
                else{
                    echo "order not found";
                }
            }
            else{
                echo "invalid or expired coupon code try again";
            }

        }
        return redirect()->route('cart');
    }
    public function removeItemFromCart(Request $req, $id){
        $product = Product::find($id);
        $user = Auth::user();
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            if($order){
                // if order exist
                $orderItem = OrderItem::where("ordered",false)->where("user_id",$user->id)->where("product_id",$id)->first();
                if($orderItem){
                        $orderItem->delete();
                        $req->session()->flash("error","Product removed from cart");
                    }
                }
                else{
                    $req->session()->flash("error","Sorry no active order exist in your cart");
                }
        }
        else{
            $req->session()->flash("error","Sorry product not found ");
        }
        return redirect()->route('cart');
    }
    public function remove_from_cart(Request $req,$id){
        $product = Product::find($id);
        $user = Auth::user();
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            if($order){
                // if order exist
                $orderItem = OrderItem::where("ordered",false)->where("user_id",$user->id)->where("product_id",$id)->first();
                if($orderItem){
                    // if orderItem exist
                    if($orderItem->qty > 1){
                        $orderItem->qty -= 1;
                        $orderItem->save();
                    }
                    else{
                        $orderItem->delete();
                        $req->session()->flash("error","Product removed from cart");
                        return redirect()->route('cart');
                    }
                }
                else{
                    //creating new orderItem
                   return redirect()->route('cart');
                }
            }

            return redirect()->route('cart');

        }
        else{
            $req->session()->flash("error","Product not found");
            return redirect()->back();
        }

    }

    public function add_to_cart(Request $req,$id){
        $product = Product::find($id);
        $user = Auth::user();
        if($product){
            $order = Order::where([["ordered",false],["user_id",$user->id]])->first();
            if($order){
                // if order exist
                $orderItem = OrderItem::where("ordered",false)->where("user_id",$user->id)->where("product_id",$id)->first();
                if($orderItem){
                    // if orderItem exist
                    $orderItem->qty += 1;
                    $orderItem->save();
                }
                else{
                    //creating new orderItem
                    $oi = new orderItem();
                    $oi->ordered = false;
                    $oi->user_id = $user->id;
                    $oi->product_id  = $id;
                    $oi->order_id = $order->id;
                    $oi->save();
                }
            }
            else{
                //if not order exist
                $o = new Order();
                $o->user_id = $user->id;
                $o->ordered = false;
                $o->save();

                // creating oderItem after order
                $oi = new orderItem();
                $oi->ordered = false;
                $oi->user_id = $user->id;
                $oi->product_id  = $id;
                $oi->order_id = $o->id;
                $oi->save();

            }
            return redirect()->route('cart');

        }
        else{
            $req->session->flash("error","Product not found");
            return redirect()->back();
        }

    }

    public function cart(){
        $data['order'] = Order::where([['user_id',Auth::id()],["ordered",false]])->first();
        return view("core.order_summary",$data);
    }

    public function checkout(){
        return view("core.checkout-page");
    }

    public function product_view(Request $req,$id){
        $data['product'] = Product::find($id);
        // $data['product'] = DB::table('products')->where('id',$id)->first();
        return view("core.product-page",$data);
    }

}
