<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\IconType;
use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;
use Aws\S3\S3Client;

class AIController extends Controller
{
    public function index(){
        $iconTypes = IconType::all();
        $colors = Color::all();
        return view('generate', compact('iconTypes', 'colors'));
    }

    public function work(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'background' => 'required',
            'IconType' => 'required',
            'shape' => 'required',
            'count' => 'required',
        ]);

        $count = (int)$request->count;
        $credit = auth()->user()->credits;
        
        if($credit >= $count){
            $result = OpenAI::images()->create([
                'prompt' => $request->name.' app icon, '.$request->color.' color, '.$request->background.' background, '.$request->IconType.' type, '.$request->shape.' rounded in the style of an iPhone app icon',
                'n' => (int)$request->count,
                'size' => '512x512',
            ]);

            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $user->credits = $user->credits - $count;
            $user->update();

            $images[] = $result->data;

            $fileName = "";
            
            foreach($images as $image){
                foreach($image as $img){
                    
                    $path = $img->url;
                    $fileName = time();
                    // Storage::disk('local')->put($fileName.'.png', file_get_contents($path));
                    // $path = Storage::path($fileName.'.png');
            
                    // return response()->download($path);
                    // $filePath = 'uploads/'. $fileName;
                    $path = Storage::disk('s3')->put($fileName.'.png', file_get_contents($path));
                    $path = Storage::disk('s3')->url($path);

                    $images_db = new Image();
                    $images_db->user_id = auth()->user()->id;
                    $images_db->image_url = $fileName.'.png';
                    $images_db->save();
                }
            }

            return view('images', compact('images'));


        }
        else{
            return redirect('dashboard')->with('credit_error', 'you do not have enough credits, please buy more credits!');
        }

        

        // $this->openai($request->name, $request->color, $request->background, $request->IconType, $request->shape, $request->count);
    }

    public function openai($name, $color, $background, $iconType, $shape, $count)
    {
        $result = OpenAI::images()->create([
            'prompt' => $name.' app icon, '.$color.' color, '.$background.' background, '.$iconType.' type, '.$shape.' rounded',
            'n' => (int)$count,
            'size' => '1024x1024',
        ]);

        $images = $result->data;
        return redirect(route('images'))->with('images');
    }
}
