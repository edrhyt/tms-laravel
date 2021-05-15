<table class="table table-striped mt-4 {{$class ?? ''}}">
  @isset($header)
  <thead>
    <tr>
      @foreach ($header as $item)
      <th><strong>{{$item}}</strong></th>
      @endforeach
    </tr>
  </thead>
  @endisset
  <tbody>
    @for ($i = 0; $i < $size; $i++)
    <tr>
      <td><strong>{{$tableData[$i]['title']}}</strong></td>
     
      @if ( ( $tableData[$i]['title'] == 'Diskon DP' ) || 
            ( $tableData[$i]['title'] == 'Total Pembayaran' ) ||
            ( $tableData[$i]['title'] == 'Netto' ) ||
            ( $tableData[$i]['title'] == 'Angsuran 1' ) ||
            ( $tableData[$i]['title'] == 'Angsuran / Bulan' )
          )
          <td>{{__(': Rp. ') . number_format($tableData[$i]['value'])}}</td>
          @else
            @if ($tableData[$i]['value'] != NULL)
              @if ($tableData[$i]['title'] == 'Jumlah Angsuran')
                <td>{{__(': ') . $tableData[$i]['value'] . __(' Kali')}}</td>
              @else
                @if (gettype( $tableData[$i]['value'] ) == 'array')
                  <td><span class="badge badge-primary badge-pill" style="font-size: 11px;"><strong>{{$tableData[$i]['value']['qty']}}</strong></span></td>
                  <td>{{__('Rp. ') . number_format($tableData[$i]['value']['subtotal'])}}</td>
                @else
                  <td>{{__(': ') . $tableData[$i]['value']}}</td>
                @endif
              @endif
            @else
              <td>{{__(': -')}}</td>
            @endif
      @endif
    </tr>
    @endfor
  </tbody>
</table>