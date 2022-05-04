@if (count($created))
<div class="scrollme" style="overflow-x: auto">
    <table class="table table-bordered table-responsive">
        <thead>
            <th class="font-weight-semi-bold" style="font-size: 14px"></th>
            @for ($i = 0; $i <= count($month_days_array) -1; $i++)
                <th class="font-weight-semi-bold" style="font-size:15px;white-space: nowrap;text-align:center;background-color: rgba(198, 199, 198, 0.897)">
                    {{ $month_days_array[$i] }}
                </th>
            @endfor
        </thead>
        <tbody>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Temperature</th>
                @for ($i = 0; $i <= count($month_days_temp_avg) - 1; $i++)
                    <td style="font-size: 12px"><span style="font-size:13px;display:inline-block;white-space: nowrap">
                        {{ Str::limit($month_days_temp_avg[$i], 4, $end = '') }} C°</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Humidite</th>
                @for ($i = 0; $i <= count($month_days_humidite_avg) - 1; $i++)
                    <td style="font-size: 12px"><span style="font-size:13px;display:inline-block;white-space: nowrap">
                        {{ Str::limit($month_days_humidite_avg[$i], 4, $end = '') }} %</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Vitesse</th>
                @for ($i = 0; $i <= count($month_days_vitesse_avg) - 1; $i++)
                    <td style="font-size: 12px"><span style="font-size:13px;display:inline-block;white-space: nowrap">
                        {{ Str::limit($month_days_vitesse_avg[$i], 4, $end = '') }}  km/h</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Pluie</th>
                @for ($i = 0; $i <= count($month_days_pluie_avg) - 1; $i++)
                    <td style="font-size: 12px"><span style="font-size:13px;display:inline-block;white-space: nowrap">
                        {{ Str::limit($month_days_pluie_avg[$i], 4, $end = '') }} L/m³</span></td>
                @endfor
            </tr>
            <tr>
                <th class="font-weight-semi-bold" style="font-size: 14px">Direction</th>
                @for ($i = 0; $i <= count($month_days_direction_avg) - 1; $i++)
                    @switch ($month_days_direction_avg[$i])
                        {{-- @case(360) <td><i class="gd-arrow-up icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord</td> @break
                        @case(90) <td><i class="gd-arrow-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Est</td> @break
                        @case(180) <td><i class="gd-arrow-down icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud</td> @break
                        @case(270) <td><i class="gd-arrow-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Ouest</td> @break
                        @case($month_days_direction_avg[$i] > 0 && $month_days_direction_avg[$i] < 90) <td style="font-size: 12px"><i class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord Est</td> @break
                        @case($month_days_direction_avg[$i] > 90 && $month_days_direction_avg[$i] < 180) <td style="font-size: 12px"><i id="sudest" class="gd-arrow-top-right icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud Est</td> @break
                        @case($month_days_direction_avg[$i] > 180 && $month_days_direction_avg[$i] < 270) <td style="font-size: 12px"><i id="sudouest" class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Sud Ouest</td> @break
                        @case($month_days_direction_avg[$i] > 270 && $month_days_direction_avg[$i] < 360) <td style="font-size: 12px"><i class="gd-arrow-top-left icon-text d-inline-block text-primary mt-2 mb-3"></i><br>Nord Ouest</td> @break --}}
                        
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
