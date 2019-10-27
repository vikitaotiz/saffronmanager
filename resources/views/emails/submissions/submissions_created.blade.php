<style>
    table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
    }
        
    td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
    }
</style>

@component('mail::message')
# Form Submission
<hr>
<table>
    <thead>
        <tr>
            <th>Submitted By</th>
            <th>Form Name</th>
            <th>Submitted On</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{\App\User::find($form->user_id)->name}}</td>
            <td>{{$form->name}}</td>
            <td>{{now()->format('D, M, Y')}}</td>
        </tr>
    </tbody>
</table>
<hr>

Thanks,<br>
{{ config('app.name') }}
@endcomponent