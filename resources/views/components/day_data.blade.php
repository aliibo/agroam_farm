@if (count($created))
<div class="scrollme" style="overflow-x: auto">
    <table class="table table-bordered table-responsive">
        <thead>
            <th></th>
            @php 
            $cosp = 0;
            for ($i = 0; $i < count($created) ; $i++) {
                if ($created[0]->format('D') != $created[$i]->format('D')) {
                    $cosp++;
                }
            }
            @endphp
            
            @for ($i = 0; $i < count($created) ; $i++)
            {{-- @for ($i = count($created) - 1; $i >= 0; $i--) --}}
                <th class="font-weight-semi-bold" style="font-size:16px;text-align:center;background-color: rgb(183, 194, 228)" colspan={{ 24 - $cosp }}>
                    @if ($created[0]->format('D') == $created[$i]->format('D'))
                        {{ $created[$i]->format('d-m-Y') }}
                    @endif
                    @break
                </th>
            @endfor
            {{-- @for ($i = 0; $i < count($created)-$cosp ; $i++) --}}
            {{-- @for ($i = 23 - $cosp; $i >= 0; $i--) --}}
                <th class="font-weight-semi-bold"  style="font-size:16px;text-align:center;background-color: rgb(228, 197, 183)" colspan={{ $cosp }}>
                    {{ $created[23]->format('d-m-Y') }}
                    {{-- @if ($created[0]->format('D') != $created[$i]->format('D'))
                        {{ $created[$i]->format('d-m-Y') }}
                    @endif
                    @break --}}
                </th>
            {{-- @endfor                             --}}
        </thead>
        <thead>
            <th class="font-weight-semi-bold" style="font-size: 14px">Date</th>
            @for ($i = 0; $i < count($created) ; $i++)
                <th class="font-weight-semi-bold" style="font-size: 14px">
                    {{ $created[$i]->format('H') }}h</th>
            @endfor
        </thead>
        <tbody>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Temperature</th>
                @for ($i = 0; $i < count($temperatures) ; $i++)
                    <td style="font-size: 12px"><span style="font-size: 12px;display: inline-block;white-space: nowrap;">
                        {{ $temperatures[$i] }} C°</span>
                    </td>
                @endfor
            </tr>
            
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Humidite</th>
                @for ($i = 0; $i < count($humidites) ; $i++)
                    <td style="font-size: 12px"><span style="font-size: 12px;display: inline-block;white-space: nowrap;">
                        {{ $humidites[$i] }} %</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Vitesse</th>
                @for ($i = 0; $i < count($vitesses) ; $i++)
                    <td style="font-size: 12px"><span style="font-size: 12px;display: inline-block;white-space: nowrap;">
                        {{ $vitesses[$i] }} km/h</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Pluie</th>
                @for ($i = 0; $i < count($pluies) ; $i++)
                    <td style="font-size: 12px"><span style="font-size: 12px;display: inline-block;white-space: nowrap;">
                        {{ $pluies[$i] }} L/m³</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px" rowspan="2">Direction</th>                
                @for ($i = 0; $i < count($directions) ; $i++)
                    @switch ($directions[$i])
                        {{-- @case(360) <td><i class="gd-arrow-up icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord</td> @break
                        @case(90) <td><i class="gd-arrow-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Est</td> @break
                        @case(180) <td><i class="gd-arrow-down icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud</td> @break
                        @case(270) <td><i class="gd-arrow-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Ouest</td> @break
                        @case($directions[$i] > 0 && $directions[$i] < 90) <td style="font-size: 12px"><i class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord Est</td> @break
                        @case($directions[$i] > 90 && $directions[$i] < 180) <td style="font-size: 12px"><i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud Est</td> @break
                        @case($directions[$i] > 180 && $directions[$i] < 270) <td style="font-size: 12px"><i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud Ouest</td> @break
                        @case($directions[$i] > 270 && $directions[$i] < 360) <td style="font-size: 12px"><i class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord Ouest</td> @break --}}
                        
                        @case(360) <td><i class="gd-arrow-down icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud</td> @break
                        @case(90) <td><i class="gd-arrow-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Ouest</td> @break
                        @case(180) <td><i class="gd-arrow-up icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord</td> @break
                        @case(270) <td><i class="gd-arrow-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Est</td> @break
                        @case($month_days_direction_avg[$i] > 0 && $month_days_direction_avg[$i] < 90) <td style="font-size: 12px"><i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud Ouest</td> @break
                        @case($month_days_direction_avg[$i] > 90 && $month_days_direction_avg[$i] < 180) <td style="font-size: 12px"><i class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord Ouest</td> @break
                        @case($month_days_direction_avg[$i] > 180 && $month_days_direction_avg[$i] < 270) <td style="font-size: 12px"><i class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord Est</td> @break
                        @case($month_days_direction_avg[$i] > 270 && $month_days_direction_avg[$i] < 360) <td style="font-size: 12px"><i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud Est</td> @break
                        
                        @default    -
                    @endswitch
                @endfor
            </tr>
        </tbody>
    </table>
</div>
@endif
