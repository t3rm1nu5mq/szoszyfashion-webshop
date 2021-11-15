<?php

    namespace App\Http\Controllers;

    use App\Models\Product;
    use DB;
    use Illuminate\Http\Request;

    class ProductController extends Controller {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\JsonResponse
         */
        public function index() {
            $products = Product::with(['details'])->get();

            return response()->json([
                'status' => 'PRODUCTS_LIST_SUCCESSFULLY',
                'data' => $products
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function store(Request $request) {
            $product = new Product();
            $product->name = $request->product_name;
            if (isset($request->product_parent)) {
                $product->parent = $request->product_parent;
            }
            $product->save();

            // todo: termék paraméterek

            return response()->json([
                'status' => 'PRODUCT_CREATED_SUCCESSFULLY',
                'message' => 'Product created successfully.'
            ]);
        }

        /**
         * Display the specified resource.
         *
         * @param $id
         * @return \Illuminate\Http\JsonResponse
         */
        public function show($id) {
            $product = Product::where('id', $id)->with(['details'])->first();
            if (empty($product)) {
                return response()->json([
                    'status' => 'PRODUCT_NOT_FOUND',
                    'message' => 'This product is not exists.'
                ]);
            }

            return response()->json([
                'status' => 'PRODUCT_LIST_SUCCESSFULLY',
                'data' => $product
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Models\Product $product
         * @return \Illuminate\Http\JsonResponse
         */
        public function update(Request $request) {
            $product = Product::where('id', $request->product_id)->first();
            if (empty($product)) {
                return response()->json([
                    'status' => 'PRODUCT_NOT_FOUND',
                    'message' => 'This product is not exists.'
                ]);
            }
            $product->name = $request->product_name;
            $product->parent = $request->product_parent;
            $product->save();

            // todo: termék részletei
            return response()->json([
                'status' => 'PRODUCT_UPDATED_SUCCESSFULLY',
                'message' => 'Product updated successfully.'
            ]);
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Models\Product $product
         * @return \Illuminate\Http\JsonResponse
         */
        public function destroy(Request $request) {
            $product = Product::where('id', '=', $request->product_id)->first();

            if (empty($product)) {
                return response()->json([
                    'status' => 'PRODUCT_NOT_FOUND',
                    'message' => 'This product is not exists.'
                ]);
            }

            DB::beginTransaction();
            $childProducts = Product::where('parent', '=', $request->product_id)->get();
            foreach ($childProducts as $childProduct) {
                try {
                    $childProduct->delete();
                } catch (\Exception $exception) {
                    DB::rollBack();
                    return response()->json([
                        'status' => 'PRODUCT_DELETING_FAILED',
                        'message' => 'An error occured while deleting product.'
                    ]);
                }
            }

            try {
                $product->delete();
            } catch (\Exception $exception) {
                DB::rollBack();
                return response()->json([
                    'status' => 'PRODUCT_DELETING_FAILED',
                    'message' => 'An error occured while deleting product.'
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => 'PRODUCT_DELETING_SUCCESSFULL',
                'message' => 'The product with variations deleted successfuly.'
            ]);
        }
    }
