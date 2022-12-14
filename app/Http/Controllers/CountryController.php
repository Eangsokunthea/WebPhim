<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Country::all();
        // return view('BackEnd.country.index',compact('list'));
        return view('BackEnd.country.editCount',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = Country::all();
        return view('BackEnd.country.form',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:191',
            'slug'=>'required|max:191',
            'description'=>'required|max:191',
            'status'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        
        {
            $data = $request->all();
            $country = new Country();
            $country->title = $data['title'];
            $country->slug = $data['slug'];
            $country->description = $data['description'];
            $country->status = $data['status'];
            $country->save();
            return response()->json([
                'status'=>200,
                'message'=>'Student Added Successfully.'
            ]);
        }

        // $data = $request->all();
        // $data = $request->validate(
        //     [
        //         'title' => 'required|unique:countries|max:255',
        //         'slug' => 'required|unique:countries|max:255',
        //         'description' => 'required|max:255',
        //         'status' => 'required',
        //     ],
        //     [
        //         'title.unique' => 'T??n qu???c gia ???? c??, xin ??i???n t??n kh??c',
        //         'slug.unique' => 'Slug qu???c gia ???? c??, xin ??i???n slug kh??c',
        //         'title.required' => 'T??n qu???c gia ph???i c??',
        //         'slug.required' => 'T??? kh??a qu???c gia ph???i c??',
        //         'description.required' => 'M?? t??? qu???c gia ph???i c??',
        //         'status.required' => 'K??cch ho???t qu???c gia ph???i c??',
        //     ]
        // );

        // $country = new Country();
        // $country->title = $data['title'];
        // $country->slug = $data['slug'];
        // $country->description = $data['description'];
        // $country->status = $data['status'];
        // $country->save();
        // toastr()->success('Th??nh c??ng','Th??m qu???c gia phim th??nh c??ng.');
        // return Redirect::to('/country');

    }

    public function fetchcountry()
    {
        $countries = Country::all();
        return response()->json([
            'countries'=>$countries,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $country = Country::find($id);
        // return view('BackEnd.country.form',compact('country'));
        
        $country = Country::find($id);
        // if($country)
        // {
            return response()->json($country);
            // return response()->json([
            //     'status'=>200,
            //     'country'=> $country,
            // ]);
        // }
        // else
        // {
        //     return response()->json([
        //         'status'=>404,
        //         'message'=>'Kh??ng t??m th???y qu???c gia n??o.',
        //     ]);
        // }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $data = $request->validate(
        //     [
        //         'title' => 'required|unique:countries|max:255',
        //         'slug' => 'required|unique:countries|max:255',
        //         'description' => 'required|max:255',
        //         'status' => 'required',
        //     ],
        //     [
        //         'title.unique' => 'T??n qu???c gia ???? c??, xin ??i???n t??n kh??c',
        //         'slug.unique' => 'Slug qu???c gia ???? c??, xin ??i???n slug kh??c',
        //         'title.required' => 'T??n qu???c gia ph???i c??',
        //         'slug.required' => 'T??? kh??a qu???c gia ph???i c??',
        //         'description.required' => 'M?? t??? qu???c gia ph???i c??',
        //         'status.required' => 'K??cch ho???t qu???c gia ph???i c??',
        //     ]
        // );
        // $country = Country::find($id);
        // $country->title = $data['title'];
        // $country->slug = $data['slug'];
        // $country->description = $data['description'];
        // $country->status = $data['status'];
        // $country->save();
        // toastr()->success('Th??nh c??ng','Update qu???c gia phim th??nh c??ng.');
        // return Redirect::to('/country');
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:191',
            'slug'=>'required|max:191',
            'description'=>'required|max:191',
            'status'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $country = Country::find($id);
            if($country)
            {
                $country->title = $request->input('title');
                $country->slug = $request->input('slug');
                $country->description = $request->input('description');
                $country->status = $request->input('status');
                $country->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'C???p nh???t qu???c gia th??nh c??ng.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Kh??ng t??m th???y qu???c gia n??o.'
                ]);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        toastr()->success('Th??nh c??ng','X??a qu???c gia phim th??nh c??ng.');
        return redirect()->back();

    }
    public function delete($id){
        Country::find($id)->delete();
        toastr()->success('Th??nh c??ng','X??a qu???c gia phim th??nh c??ng.');
        return redirect()->back();
    } 
      
    public function edit_country($id)
    {
        $country = Country::find($id);
        if($country)
        {
            return response()->json([
                'status'=>200,
                'country'=> $country,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'Kh??ng t??m th???y qu???c gia n??o.',
            ]);
        }

    }
    public function update_country(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'=> 'required|max:191',
            'slug'=>'required|max:191',
            'description'=>'required|max:191',
            'status'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $country = Country::find($id);
            if($country)
            {
                $country->title = $request->input('title');
                $country->slug = $request->input('slug');
                $country->description = $request->input('description');
                $country->status = $request->input('status');
                $country->update();
                return response()->json([
                    'status'=>200,
                    'message'=>'C???p nh???t qu???c gia th??nh c??ng.'
                ]);
            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'Kh??ng t??m th???y qu???c gia n??o.'
                ]);
            }

        }
    }

    //UPDATE COUNTRY DETAILS
    // public function updateCountryDetails(Request $request, $id){
    //     $data = $request->validate(
    //         [
    //             'title' => 'required|unique:countries|max:255',
    //             'slug' => 'required|unique:countries|max:255',
    //             'description' => 'required|max:255',
    //             'status' => 'required',
    //         ],
    //         [
    //             'title.unique' => 'T??n qu???c gia ???? c??, xin ??i???n t??n kh??c',
    //             'slug.unique' => 'Slug qu???c gia ???? c??, xin ??i???n slug kh??c',
    //             'title.required' => 'T??n qu???c gia ph???i c??',
    //             'slug.required' => 'T??? kh??a qu???c gia ph???i c??',
    //             'description.required' => 'M?? t??? qu???c gia ph???i c??',
    //             'status.required' => 'K??cch ho???t qu???c gia ph???i c??',
    //         ]
    //     );
    //     $country = Country::find($id);
    //     $country->title = $data['title'];
    //     $country->slug = $data['slug'];
    //     $country->description = $data['description'];
    //     $country->status = $data['status'];
    //     $country->save();
        
    //     toastr()->success('Th??nh c??ng','Update qu???c gia phim th??nh c??ng.');
    //     return Redirect::to('/country');

    // }
}
