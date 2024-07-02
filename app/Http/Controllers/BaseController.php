<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\CallRequests;
use App\Models\Diseases;
use App\Models\Meta;
use App\Models\Products;
use App\Models\Translations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use PharIo\Version\Exception;

class BaseController extends Controller
{
    public function change_current_language($lang) {
        try {
            $update = Meta::where('key', 'locale')->update(['value' => $lang]);
            if($update) {
                return ['message' => 'Success'];
            }
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function get_translations($key) {
        try {
            $curLang = Meta::where('key', 'locale')->get()[0]->value;

            $translations = Translations::where('key', 'like', $key.'__%')
                                        ->where('encoding', $curLang)
                                        ->get();
            return ['data' => $translations];
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function get_products($lang) {
        try {
            $products = Products::where('lang', $lang)->get();

            if($products) {
                return [ 'data' => $products ];
            } else {
                return [ 'message' => 'No data found' ];
            }
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function get_product($key) {
        try {
            $product = Products::where('key', $key)->get();

            if($product) {
                return [ 'data' => $product ];
            } else {
                return [ 'message' => 'No product found' ];
            }
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function get_disease($key) {
        try {
            $disease = Diseases::where('key', $key)->get();;

            if($disease) {
                return [ 'data' => $disease ];
            } else {
                return [ 'message' => 'No disease found' ];
            }
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }
    public function get_diseases($lang) {
        try {
            $diseases = Diseases::where('lang', $lang)->get();

            if($diseases) {
                return [ 'data' => $diseases ];
            } else {
                return [ 'message' => 'No data found' ];
            }
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function create_call_request(Request $request) {
        try {
//            $data = $request->all();
            $create = CallRequests::create($request->all());

            if($create) {
//                Mail::to('tnsscareer@gmail.com')
//                    ->send(new SendMail($data));
                return [ 'message' => 'Success' ];
            } else {
                return [ 'message' => 'Internal Server Error' ];
            }
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function add_product(Request $request) {
        try {
            $data = $request->all()['data'];
            $message = 'Payload is empty';

            foreach ($data as $value) {
                $value['filters'] = $request->all()['filters'];
                $value['key'] = lcfirst(str_replace(" ", "_", $request->all()['key']));
                $create = Products::create($value);

                if ($create) {
                    $message = 'Success';
                } else {
                    $message = 'Internal Server Error';
                }
            }

            return ['message' => $message];
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }

    public function add_disease(Request $request) {
        try {
            $data = $request->all()['data'];
            $message = 'Payload is empty';

            foreach ($data as $value) {
                $value['key'] = lcfirst(str_replace(" ", "_", $request->all()['key']));
                $create = Diseases::create($value);

                if ($create) {
                    $message = 'Success';
                } else {
                    $message = 'Internal Server Error';
                }
            }

            return ['message' => $message];
        }
        catch(Exception $e) {
            Log::info($e->getMessage());
            return ['message' => $e->getMessage()];
        }
    }
}
