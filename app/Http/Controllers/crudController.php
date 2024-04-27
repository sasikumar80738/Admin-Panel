<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\crud; 
use App\Imports\CrudImport; 
use illuminate\Validation;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class crudController extends Controller
{
    public function index()
    {
        $data = Crud::paginate(15); 
        return view('crud', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'datetime' => 'required',
            'status' => 'required',
        ], [
            'description.min' => 'The city must be at least 3 characters long.',
        ]);
        $data = Crud::create($validatedData);

        return response()->json(['message' => 'Post successfully created', 'data' => $data], 201); 

    }
    
    public function edit($id)
    {
        $item = Crud::find($id);
        return response()->json(['itemm' => $item,'status'=>'success']);
    }
    
    public function delete($id)
      {
    $item = Crud::findOrFail($id);
    $item->delete();
    return redirect()->route('index');
       }

    public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'datetime' => 'required',
        'description' => 'required|string',
        'status' => 'required|in:active,inactive',
    ]);

    $item = Crud::findOrFail($id);
    $item->update($validatedData);
    return response()->json(['message' => 'Item updated successfully']);
}

  public function livesearch(Request $request){
    $query = $request->input('query'); 

    $data = Crud::where('title', 'like', '%'.$query.'%')
    ->orWhere('description', 'like', '%'.$query.'%')
    ->get();

return response()->json(["data" => $data]);
}

public function import(Request $request)
{
    $file = $request->file('import_file');
   
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    
    $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
    
    $i=0;
    foreach ($sheetData as $row) {
        if( $i >0){
            $title = $row['A'];
            $description = $row['B'];
            $status = $row['D'];
            $created_at = $row['C'];
     
             $Crud = new Crud;
             $Crud->title = $title;
             $Crud->description = $description;
             $Crud->status =  $status;
             $Crud->datetime = $created_at;
     
             $Crud->save();
        }
        $i++;
    }

    return redirect()->route('index');
}

public function export()
{
    $data = Crud::all();
  
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $A1="title";
    $B1="description";
    $C1="datetime";
    $D1="status";
    $sheet->SetCellValue('A1', $A1);
    $sheet->SetCellValue('B1', $B1);
    $sheet->SetCellValue('C1', $C1);
    $sheet->SetCellValue('D1', $D1);
    $row = 2; 
    foreach ($data as $item) {
        $sheet->setCellValue('A'.$row, $item->title);
        $sheet->setCellValue('B'.$row, $item->description);
        $sheet->setCellValue('C'.$row, $item->created_at);
        $sheet->setCellValue('D'.$row, $item->status);
        $row++;
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="crud_data.xlsx"');
    header('Cache-Control: max-age=0');

    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
}

}

