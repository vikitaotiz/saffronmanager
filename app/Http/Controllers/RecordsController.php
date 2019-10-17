<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use App\Room;
use DB;

class RecordsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $records = Record::latest()->get()->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"));

    //   dd($records);

      $rooms = Room::all();

      return view('Records.index', compact('records', 'rooms'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {

      $rooms = Room::latest()->get();

      return view('records.create', compact('rooms'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $record = $this->validateRequest();

      $record = new Record;

      $record->bath_towel = $request->bath_towel;
      $record->bed_sheet = $request->bed_sheet;
      $record->pillow_case = $request->pillow_case;
      $record->duvet_cover = $request->duvet_cover;
      $record->bed_cover = $request->bed_cover;
      $record->prayer_mat = $request->prayer_mat;
      $record->room_id = $request->room_id;

      $record->user_id = auth()->user()->id;

      $record->save();

      return redirect()->route('admin.records.index')->with('success', 'Record is created successfully!');

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $record = Record::findOrfail($id);

      return view('Records.show');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $record = Record::findOrfail($id);

      return view('Records.edit');
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
    $record = $this->validateRequest();

    $record = Record::findOrfail($id);

    $record->bath_towel = $request->bath_towel;
    $record->bed_sheet = $request->bed_sheet;
    $record->pillow_case = $request->pillow_case;
    $record->duvet_cover = $request->duvet_cover;
    $record->bed_cover = $request->bed_cover;
    $record->prayer_mat = $request->prayer_mat;
    $record->room_id = $request->room_id;

    $record->user_id = auth()->user()->id;

    $record->save();

    return redirect()->route('admin.Records.show', $record->id)->with('success', 'Record updated successfully!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $record = Record::findOrfail($id);

      $record->delete();

      return redirect()->route('admin.Records.index')->with('success', 'Record is deleted successfully!');
  }

    public function validateRequest()
    {
        return request()->validate([

            'room_id' => 'required',

            'bath_towel' => '',
            'bed_sheet' => '',
            'duvet_cover' => '',
            'pillow_case' => '',
            'bed_cover' => '',
            'prayer_mat' => '',

        ]);

    }
}
