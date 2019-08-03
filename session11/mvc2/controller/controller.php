<?php 
	include 'model/model.php';
	include 'libs/function.php';
	class Controller {

		public function handleRequest() {
			$model = new Model();
			$functionCommon = new FunctionCommon();
			$action = isset($_GET['action'])?$_GET['action']:'home';
			switch ($action) {
				case 'home':
					// goi model get du lieu
					$home = $model->getHomePage();

					// goi view home
					include 'view/home/home.php';
					break;
				case 'news':
					// goi model xu ly du lieu
					$showNews = $model->getNews();
					$related = $model->getNewsRelated();

					// goi view news
					include 'view/news/news.php';
					break;
				case 'products':
					// goi model xu ly du lieu
					$productList = $model->getProductPage();
					// goi view products
					include 'view/products/products.php';
					break;
				case 'product_detail':
					// lay id cua san pham chi tiet
					$id = $_GET['id'];
					// goi model xu ly du lieu
					$productDetail = $model->getProductDetail($id);
					// goi view products
					include 'view/products/product_detail.php';
					break;
				case 'contact':
					// goi view contact
					include 'view/contact/contact.php';
					break;
				case 'delete_product':
				   // lay id cua san pham can xoa
					$id = $_GET['id'];
					// goi model thuc hien xoa san pham
					if ($model->deleteProduct($id) === TRUE) {
						//header("Location: "index.php?action=products);
						$functionCommon->redirectPage('index.php?action=products');
					}
					break;
				case 'add_product':
					# code...
					// check xem da submit add product chua?
					$errName = $errDes = $errPrice = $errImage ='';
				    $name = $price = $description = '';
				    $checkAdd = true;
					if (isset($_POST['add_product_form'])) {
						$name = $_POST['name'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$image = 'default.jpg';
						$created = date('Y-m-d h:i:s');

						if ($name == '') {
					        $errName = 'Please input product name';
					        $checkAdd = false;
					    }
					    if ($description == '') {
					        $errDes = 'Please input product description';
					        $checkAdd = false;
					    }
					    if ($price == '') {
					        $errPrice = 'Please input product price';
					        $checkAdd = false;
					    }
					    //
					    if ($checkAdd) {
					        // check and upoad image
					        if ($_FILES['image']['error'] == 0) {
					          $image = uniqid().'_'.$_FILES['image']['name'];
					          move_uploaded_file($_FILES['image']['tmp_name'], 'uploads'.$image);
					        }
							// save vao database
							if ($model->addProduct($name, $description, $price, $image, $created) === TRUE) {
								$functionCommon->redirectPage('index.php?action=products');
							}
						}
					}
					// goi view hien thi trang add product
					include 'view/products/add_product.php';
					break;
				case 'edit_product':
					$errName = $errDes = $errPrice = '';
					$name = $price = $description = '';
					$checkAdd = true;
					//check xem da submit edit product chua?
					if (isset($_POST['edit_product_form'])) {
						$name = $_POST['name'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$image = 'default.jpg';

						if ($name == '') {
					        $errName = 'Please input product name';
					        $checkAdd = false;
					      }
					      if ($description == '') {
					        $errDes = 'Please input product description';
					        $checkAdd = false;
					      }
					      if ($price == '') {
					        $errPrice = 'Please input product price';
					        $checkAdd = false;
					      }
					     if ($checkAdd) {
					        // check and upoad image
					        if ($_FILES['image']['error'] == 0) {
					          $oldImage = $image;
					          $image = uniqid().'_'.$_FILES['image']['name'];
					          move_uploaded_file($_FILES['image']['tmp_name'], 'uploads'.$image);
					          // Xoa anh cu neu chon anh moi (tru truong hop a cu la anh default)
					          if ($oldImage != 'default.jpg') {
					            unlink("uploads".$oldImage);  
					          }
					        }
						// save vao database
						if ($model->editProduct($name, $description, $price, $image) === TRUE) {
							$functionCommon->redirectPage('index.php?action=products');
						}
					  }
					}
					// goi view hien thi trang add product
					include 'view/products/edit_product.php';
					break;
				default:
					# code...
					break;
			}
		}

	}
?>