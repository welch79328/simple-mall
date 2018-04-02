<?php

namespace App\Http\Controllers\Frontend;

use Modules\Member\Entities\Member;
use Gloudemans\Shoppingcart\Facades\Cart;
use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{

    const ERROR_IMG_URL = "/images/no_img.gif";

    function __construct()
    {
        $this->shareTopCategoriesGroup();
        $this->shareErrorImgUrl();
        $this->shareShoppingCartCount();
        $this->shareMember();
    }

    public static function getCategoriesTree($elements, $parentId = 0)
    {
        $categories = array();
        foreach ($elements as $element) {
            if ($element->cate_parent == $parentId) {
                $children = self::getCategoriesTree($elements, $element->cate_id);
                $element->children = ($children) ? $children : [];
                $categories[] = $element;
            }
        }
        return $categories;
    }

    private function shareTopCategoriesGroup()
    {
        $topCategories = Category::where("cate_parent", 0)->orderBy('cate_order', 'asc')->get();
        $topCategoriesGroup = [];
        $i = 0;
        foreach ($topCategories as $index => $topCate) {
            $topCategoriesGroup[$i][] = $topCate;
            if ($index % 12 == 0 && $index != 0) {
                $i++;
            }
        }
        view()->share('topCategoriesGroup', $topCategoriesGroup);
    }

    private function shareErrorImgUrl()
    {
        view()->share('errorImgUrl', self::ERROR_IMG_URL);
    }

    private function shareShoppingCartCount()
    {
        $cart = Cart::content();
        $cartCount = count($cart);
        view()->share('cartCount', $cartCount);
    }

    private function shareMember()
    {
        $member_id = session("member.member_id");
        $member = Member::find($member_id);
        view()->share('member', $member);
    }

    public static function failResponse($msg = "")
    {
        $response = [
            "result" => false,
            "msg" => $msg
        ];
        return $response;
    }

    public static function successResponse($msg = "")
    {
        $response = [
            "result" => true,
            "msg" => $msg
        ];
        return $response;
    }


}
