<?php
header("Access-Control-Allow-Origin: *");

class ProductService {
	
	function restGet($params) {
		$type = array_shift($params);
		if ($type==='all') {
			// list all products
			require_once 'db.php';
			
			$resultArray = array();
			$sql = "SELECT * FROM product";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['productid'] = $row->productid;
					$record['category'] = $row->category;
					$record['productname'] = $row->productname;
					$record['price'] = $row->price;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
		} else if ($type==='productid') {
			require_once 'db.php';
			$productid = array_shift($params);

			
			$resultArray = array();
			$sql = "SELECT * FROM product WHERE productid='$productid'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['productid'] = $row->productid;
					$record['category'] = $row->category;
					$record['productname'] = $row->productname;
					$record['price'] = $row->price;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
		} else if ($type==='category') {
			require_once 'db.php';
			$category = array_shift($params);

			
			$resultArray = array();
			$sql = "SELECT * FROM product WHERE category LIKE '%$category%'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['productid'] = $row->productid;
					$record['category'] = $row->category;
					$record['productname'] = $row->productname;
					$record['price'] = $row->price;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
		} else if ($type==='productname') {
			require_once 'db.php';
			$productname = array_shift($params);

			
			$resultArray = array();
			$sql = "SELECT * FROM product WHERE productname LIKE '%$productname%'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['productid'] = $row->productid;
					$record['category'] = $row->category;
					$record['productname'] = $row->productname;
					$record['price'] = $row->price;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
		} else if ($type==='price') {
			require_once 'db.php';
			$price = array_shift($params);

			
			$resultArray = array();
			$sql = "SELECT * FROM product WHERE price<='$price'";
			if ($dbresult=$conn->query($sql)) {
				// records retrieved
				while ( $row=$dbresult->fetch_object()  ) {
					$record = array();
					$record['productid'] = $row->productid;
					$record['category'] = $row->category;
					$record['productname'] = $row->productname;
					$record['price'] = $row->price;
					$resultArray[] = $record;
				}
				echo json_encode($resultArray);
			} else {
				// retrieval failed
				echo "sql failed";
				exit;
			}
		}

	}
	
	function restPost($params) {
		// ADD
		// add a new booking record
		require_once 'db.php';
		$category = array_shift($params);
		$productname = array_shift($params);
		$price = array_shift($params);
			
		$resultArray = array();
		$sql = "INSERT INTO product (category, productname, price) VALUES ('$category', '$productname', '$price')";

		if ($dbresult=$conn->query($sql)) {
			$resultArray['result'] = 'Product added successfully';
			echo json_encode($resultArray);
		} else {
			// retrieval failed
			echo "sql failed";
			exit;
		}
	}
	



	function restPut($params) {
		echo "No PUT supported";
	}
	
	function restDelete($params) {
		echo "No DELETE supported";
	}
}








