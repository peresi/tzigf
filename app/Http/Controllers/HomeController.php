<?php

namespace App\Http\Controllers;

use App\Models\MediaNews;
use App\Models\Report;
use App\Models\TigwItem;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'reports' => Report::query()->latest('report_year')->latest()->get(),
            'mediaNews' => MediaNews::query()->latest('published_at')->latest()->get(),
            'tigwItems' => TigwItem::query()->orderBy('display_order')->latest()->get(),
        ]);
    }

    public function gallery()
    {
        return view('gallery', [
            'albumTitle' => 'TzIGF_2025',
            'albumUrl' => 'https://photos.google.com/share/AF1QipPlzOYE6Qho9smZVuPrv1LJr6XsE6G2LyVJV35pVxDNyUbRESbmsTiDcUUR7cXAyw?key=U2t1UVNDNFlocHdjelRMejlYaUJFUUVlV0g1eFB3',
            'photos' => [
                [
                    'title' => 'TzIGF 2025 Photo 1',
                    'image' => 'https://lh3.googleusercontent.com/pw/AP1GczM4n6x6KbsJ-WRXaJVN5fsxvxCVtxr4WNcQ2Z0v7quT6APNs4KPh1azFmcWQptEuS2KKhn_UiXDTg0HOjdh8dTNvYy6Q40zx6hsvMlUbI-DPWlm9pE_I9Y6ZZS_q0P0sj1FrcicJjSHG39JBH1gdFsXtA=w1600-h1066-s-no-gm',
                    'link' => 'https://photos.google.com/share/AF1QipPlzOYE6Qho9smZVuPrv1LJr6XsE6G2LyVJV35pVxDNyUbRESbmsTiDcUUR7cXAyw/photo/AF1QipN9d1tXaq_CUqk8lmHzhy7mPbkMj_TSNH9kohd7?key=U2t1UVNDNFlocHdjelRMejlYaUJFUUVlV0g1eFB3',
                ],
            ],
        ]);
    }
}
