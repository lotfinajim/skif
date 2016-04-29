@extends('layout')

@section('title')
Horaire Page - Skif
@stop


@section('content')
<div class="table-responsive">
    <table class="table  horairetable">
        <tr>
          <th></th>
          <th>de 6 à 7 ans</th>
          <th>de 8 à 9 ans</th>
          <th>de 9 à 12 ans</th>
          <th>de 13 à 16 ans</th>
          <th>de 17ans et plus</th>
          <th>7<sup>éme</sup> KYU et + (KUMITE)</th>
          <th>7<sup>éme</sup> KYU et + (KUMITE)</th>
          <th>3<sup>éme</sup> KYU et plus</th>
          <th>KUMITE </th>
        </tr>
        <tr>
            <td>LUNDI</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td class="info">21:00 - 22:00</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>MARDI</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>MERCREDI</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td  class="info">16h45-18h00</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td  class="info">20:45 - 22:00</td>
            <td></td>

        </tr>
        <tr>
            <td>JEUDI</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td  class="info">20:15 - 21:30</td>
        </tr>
        <tr>
            <td>VENDREDI</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td class="info">21:00 - 22:00</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>SAMEDI</td>
            <td class="info">13:30 - 14:30</td>
            <td class="info">14:30 - 15:30</td>
            <td  class="info">15:30 - 16:45 </td>
            <td  class="info">16:45 - 18:00 </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
        <tr>
            <td>DIMANCHE</td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td  class="info">10:00 - 11:00 </td>
            <td  class="info">11:45 - 12:00 </td>
            <td> </td>
            <td> </td>
        </tr>
    </table>
</div>

@stop