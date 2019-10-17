<style>
        #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #customers tr:nth-child(even){background-color: #f2f2f2;}
        
        #customers tr:hover {background-color: #ddd;}
        
        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #3C8DBC;
          color: white;
        }
</style>

@component('mail::message')
# Form Submission


<table id="customers">
    <tbody>
        <tr>
            <th>Form Name</th>
            <th>Form Submitted By</th>
            <th>Form Submitted On</th>
        </tr>
    </tbody>
    <thead>
        <tr>
            <td>
                {{\jazmy\FormBuilder\Models\Form::find($submission->form_id)->name}}
            </td>
            <td>
                {{\App\User::find($submission->form_id)->name}}
            </td>
            <td>{{$submission->created_at->format('g:i a D, jS, M, Y')}}</td>
        </tr>
    </thead>
</table>


Thanks,<br>
{{ config('app.name') }}
@endcomponent


