<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductModel;

class CartController extends Controller
{
 
        public function addToCart()
        {
            // Get the product information from the form
            $product_id = $this->request->getPost('product_id');
            $product_image = $this->request->getPost('product_image');
            $product_price = $this->request->getPost('product_price');
            $product_name = $this->request->getPost('product_name');
            $quantity = $this->request->getPost('quantity');

    
            // Add the product to the cart
            $cart = session('cart') ?? [];
            if (array_key_exists($product_id, $cart)) {
                // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
                $cart[$product_id]['SoLuongSP'] += $quantity;
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
                $cart[$product_id] = [
                    'MaSP'      => $product_id,
                    'HinhAnhSP' => $product_image,
                    'SoLuongSP' => $quantity,
                    'GiaSP'     => $product_price,
                    'TenSP'     => $product_name,
                ];
            }
    
            // Save the cart back to the session
            session()->set('cart', $cart);
    
            // Redirect back to the shop page or cart page
            return redirect()->to(base_url('cart'));

        }
 
        public function index()
        {
            // Lấy dữ liệu giỏ hàng từ session hoặc bất kỳ nguồn dữ liệu nào khác
            $cart_items = session('cart') ?? [];
        
            // Truyền biến $cart_items vào view
         

            return view('user/cart', ['cart_items' => $cart_items, 'product_image' => '' , 'product_name' =>'']);

        }
        // xóa sản phẩm
        public function removeItem($productId)
        {
            // Xử lý logic xóa sản phẩm từ giỏ hàng
            // (Điều này nên được thực hiện theo cách bạn lưu trữ giỏ hàng, có thể là session, database, ...)
    
            // Ví dụ: Xóa sản phẩm có ID là $productId
            // (Lưu ý: Điều này chỉ là ví dụ và bạn cần điều chỉnh nó theo cách bạn triển khai giỏ hàng)
            $cart = session()->get('cart'); // Giả sử giỏ hàng được lưu trữ trong session
            unset($cart[$productId]);
            session()->set('cart', $cart);
    
            return redirect()->to('/cart'); // Điều hướng về trang giỏ hàng sau khi xóa sản phẩm
        }

        ///update 
        public function updateCart()
        {
            // Lấy các số lượng cập nhật và ID sản phẩm từ biểu mẫu
            $quantities = $this->request->getPost('quantity');
            $product_ids = $this->request->getPost('product_id');

            // Lấy giỏ hàng hiện tại từ session
            $cart = session('cart') ?? [];

            // Cập nhật số lượng trong giỏ hàng
            foreach ($product_ids as $index => $product_id) {
                if (array_key_exists($product_id, $cart)) {
                    $cart[$product_id]['SoLuongSP'] = $quantities[$index];
                }
            }

            // Lưu giỏ hàng đã cập nhật vào session
            session()->set('cart', $cart);

            // Chuyển hướng trở lại trang giỏ hàng
            return redirect()->to(base_url('cart'));
        }


    
}