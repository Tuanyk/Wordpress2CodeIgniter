<?php namespace App\Controllers;

class Blog extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function post($id)
	{
		$this->cachePage(86400);
		helper("func");
		helper("sanitize");
		$data = getPostData($id);
		echo view("single_post", $data);
	}
	public function product($id)
	{
		$this->cachePage(86400);
		helper("func");
		helper("sanitize");
		$data = getProductData($id);
		$data["product_ID"] = $id;
		echo view("single_product", $data);
	}
	public function page($id)
	{
		$this->cachePage(86400);
		helper("func");
		helper("sanitize");
		$data = getPageData($id);
		echo view("single_page", $data);
	}
	public function postcat($id)
	{
		$this->cachePage(86400);
		helper("func");
		helper("sanitize");
		$data = getPostCatData($id);
		echo view("category", $data);
	}
	public function productcat($id)
	{
		$this->cachePage(86400);
		helper("func");
		helper("sanitize");
		$data = getProductcatData($id);
		echo view("product_category", $data);
	}
	public function productatt($id)
	{
		$this->cachePage(86400);
		helper("func");
		helper("sanitize");
		$data = getProductattData($id);
		echo view("product_att", $data);
	}
	public function search($search_str)
	{
		helper("func");
		helper("sanitize");
		$data["search_str"] = $search_str;
		echo view("search", $data);
	}
	public function shop()
	{
		helper("func");
		helper("sanitize");
		$data["products"] = getShopData();
		echo view("cua_hang", $data);
	}
}
