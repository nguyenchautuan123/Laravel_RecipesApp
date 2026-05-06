<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TheMealDbController extends Controller
{
    private $API_URL = 'https://www.themealdb.com/api/json/v1/1';

    //Tìm kiếm món ăn theo tên
    // GET /api/meals/search?q=chicken
    public function search(Request $request){
        $query = $request->query('q', '');
        $response = Http::get("{$this->API_URL}/search.php", ['s' => $query]);
        return response()->json($response->json());
    }

    // Lấy danh sách tất cả categories
    // GET /api/meals/categories
    public function categories(){
        $response = Http::get("{$this->API_URL}/categories.php");
        return response()->json($response->json());
    }

    // Lấy món ăn theo category
    // GET /api/meals/by-category?c=Seafood
    public function byCategory(Request $request){
        $category = $request->query('c', '');
        $response = Http::get("{$this->API_URL}/filter.php", ['c' => $category]);
        return response()->json($response->json());
    }

    // Lấy món ăn theo quốc gia
    // GET /api/meals/by-country?a=Italian
    public function byCountry(Request $request){
        $area = $request->query('a', '');
        $response = Http::get("{$this->API_URL}/filter.php", ['a' => $area]);
        return response()->json($response->json());
    }

    // Lấy món ăn theo ingredient
    // GET /api/meals/by-ingredient?i=chicken
    public function byIngredient(Request $request){
        $ingredient = $request->query('i', '');
        $response = Http::get("{$this->API_URL}/filter.php", ['i' => $ingredient]);
        return response()->json($response->json());
    }

    // Lấy chi tiết món ăn theo ID
    // GET /api/meals/{id}
    public function detail($id){
        $response = Http::get("{$this->API_URL}/lookup.php", ['i' => $id]);
        return response()->json($response->json());
    }

    // Lấy danh sách tất cả quốc gia
    // GET /api/meals/countries
    public function countries(){
        $response = Http::get("{$this->API_URL}/list.php", ['a' => 'list']);
        return response()->json($response->json());
    }

    // Lấy danh sách tất cả ingredients
    // GET /api/meals/ingredients
    public function ingredients(){
        $response = Http::get("{$this->API_URL}/list.php", ['i' => 'list']);
        return response()->json($response->json());
    }

    // Lấy món ăn ngẫu nhiên
    // GET /api/meals/random
    public function random(){
        $response = Http::get("{$this->API_URL}/random.php");
        return response()->json($response->json());
    }
}
