
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <meta http-equiv="Content-Type" content=
        "text/html; charset=UTF-8">

        <title>CarApi - Ergebnisse</title>
        <link rel="stylesheet" type="text/css"
        href="http://yui.yahooapis.com/2.4.1/build/reset-fonts-grids/reset-fonts-grids.css">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('custom/libs/carcopyapi/css/design1.css') }}">
    <script language="JavaScript" type="text/javascript" src="{{ asset('custom/libs/carcopyapi/js/cc.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="print" href="{{ asset('custom/libs/carcopyapi/css/design1p.css') }}">
    </head>

    <body>

<a class="back" href="{{route('carcopy.index')}}">Suche verfeinern</a>

    <div class="searchListContainer">
        <h2>Suchergebnisse</h2>
        <table class="searchList">
            <thead>
                <tr>
                    <th class="pic">&nbsp;</th>
                    <th class="result">Suchergebnisse (<?php echo ($start+1).' - '.($start+$resultcount).' / '.$totalcount.' Fahrzeuge'; ?>)</th>
                    <th class="ez">EZ</th>
                    <th class="km">km</th>
                    <th class="price">Preis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <?php
                        $pages = ceil( $totalcount/$limit);
                        if( $pages > 1 )
                        {
                            $items = array();
                            for( $i=1 ; $i<=$pages ; $i++ )
                            {
                                if( $i == $page )
                                {
                                    $items[]=$i;
                                }
                                else
                                {
                                    $items[]='<a href="list.php?search='.$thisSearchKey.'&page='.$i.'">'.$i.'</a>';
                                }
                            }
                            echo ' [ '.implode(' ',$items).' ] ';
                        }
                        else
                        {
                            echo ' [ Seite 1 ]';
                        }
                        ?>
                    </td>
                </tr>
            </tfoot>
            <tbody>

                <?php
                //$return

                foreach( $return->Vehicle as $oneCar )
                {
                ?>

                <tr>
                    <td class="pic">
                        <?php
                            if( isset($oneCar->Pictures->Picture[0]) )
                            {
                        ?>
                        <a href="{{route('carcopy.view',["cid"=>$oneCar->Id,"search"=>$thisSearchKey])}}">
                            <img alt="Bild" src="<?php echo $oneCar->Pictures->Picture[0]->Preview->Href ?>">
                        </a>
                        <?php
                            }
                        ?>
                    </td>
                    <td class="result">
                        <h4>
                            <a href="{{route('carcopy.view',["cid"=>$oneCar->Id,"search"=>$thisSearchKey])}}">
                                <?php echo $oneCar->Manufacturer->Name ?>, <?php echo $oneCar->Model,' ',(isset($oneCar->SModel)?$oneCar->SModel:'') ?>
                            </a>
                        </h4>
                        <div>
                            <?php echo $oneCar->Freetext->Default ?>
                        </div>
                    </td>
                    <td class="ez"><?php echo App\Http\Controllers\CarCopyController::formatEZ($oneCar->RegDate) ?></td>
                    @if(isset($oneCar->Km))
                    <td class="km"><?php echo App\Http\Controllers\CarCopyController::formatKM($oneCar->Km) ?></td>
                    @else
                    <td class="km">-</td>
                    @endif
                    <td class="price"><?php echo number_format($oneCar->Price->Client,2,',','.') ?> EUR</td>
                    <td><button>Send to Justcar</button></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    </body>
</html>