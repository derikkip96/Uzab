<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use App\Models\Page;

class Menu
{
    /**
     * Store Management Menu.
     *
     * @param  $shopID
     * @param  bool $returnArray, json or array
     * @param $path
     *
     * @return \Illuminate\Http\JsonResponse | array
     *
     */
    public static function portalMenu($path, $returnArray = false, $shopID = null)
    {
            $menu = collect([

                ['route' => '#', 'text' => 'Catalogue','icon' => 'mdi mdi-database','children' => [
                    ['route' => route('merchant.products.index'), 'text' => 'Products'],
                    ['route' => route('merchant.categories.index'),'text' => 'Product Categories'],
                    ['route' => route('merchant.brands.index'), 'text' => 'Brands'],
                ]],

            ]);

        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * Store front Menu.
     *
     * @param  bool $returnArray, json or array
     *
     * @return \Illuminate\Http\JsonResponse | array
     *
     */
    public static function storeFrontMenu($returnArray = false)
    {
        $menu = collect([
            ['route' => route('store-front.home'), 'text' => 'Home'],
            ['route' => route('store-front.categories.index'), 'text' => 'Shop by category'],
            ['route' => route('store-front.products.index'), 'text' => 'Products'],
        ]);

        if ((! is_null(Page::aboutUsPage()->first())) && (Page::aboutUsPage()->first()->status === 'published')) {
            $menu->push(['route' => '/about-us', 'text' => 'About Us']);
        }

        $menu->push(['route' => '/contact-us', 'text' => 'Contact Us']);

        return $returnArray ? $menu : json_encode($menu);
    }

    /**
     * Store front Menu.
     *
     * @param  bool $returnArray, json or array
     *
     * @return \Illuminate\Http\JsonResponse | array
     *
     */
//    public static function storeFrontFooterMenu($returnArray = false)
//    {
//        $menu = collect([
//            ['route' => route('store-front.home'), 'text' => 'Home'],
//        ]);
//
//        if ((! is_null(Page::privacyPolicyPage()->first())) && (Page::privacyPolicyPage()->first()->status === 'published')) {
//            $menu->push(['route' => '/privacy-policy', 'text' => 'Privacy Policy']);
//        }
//
//        if ((! is_null(Page::cookiePolicyPage()->first())) && (Page::cookiePolicyPage()->first()->status === 'published')) {
//            $menu->push(['route' => '/cookie-policy', 'text' => 'Cookie Policy']);
//        }
//
//        if ((! is_null(Page::dataPolicyPage()->first())) && (Page::dataPolicyPage()->first()->status === 'published')) {
//            $menu->push(['route' => '/data-policy', 'text' => 'Data Policy']);
//        }
//
//        return $returnArray ? $menu : json_encode($menu);
//    }

}
