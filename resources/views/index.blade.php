@include('layouts.header')
<div class="container" style="margin-top: 60px;">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4 text-center">Enter your weight here</h1>
            <div class="text-center">
                <form method="post" action="/insertWeights">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter your weight">
                    </div>
                    <input type="submit" value="Go!" class="btn btn-success">
                </form>
                <hr>
                <h4>You can view your weight chart from here : </h4>
                <button class="btn btn-info" data-toggle="modal" data-target="#chartModal">Chart</button>
            </div>
        </div>
    </div>
    <div>
        <h3 class="text-center">Your weights are here</h3>
        <div>
            <table class="table">
                <thead class="text-center">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Weight(in Kg)</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody id="showWeights" class="text-center">
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Chart Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="chartModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Your weight chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <canvas id="myChart" style="width:75%;"></canvas>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
<script>
    var baseurl = '{{URL::to("/")}}';
    var i;
    $(document).ready(function() {
        getWeights();
    });

    function getWeights() {
        $.ajax({
            method: "GET",
            url: baseurl + "/api/fetch/allweights",
            success: function(result) {
                var data = result.data;
                var append = "";
                var weights = [];
                var dates = [];
                for (i = 0; i < data.length; i++) {
                    append = '<tr>' +
                        '<th scope="row">' + data[i].id + '</th>' +
                        '<td>' + data[i].weight + '</td>' +
                        '<td>' + data[i].inserted_datetime + '</td>' +
                        '</tr>';
                    $('#showWeights').append(append);
                    weights[i] = data[i].weight;
                    dates[i] = data[i].inserted_datetime;
                }
                showChart(weights, dates);
            }
        });
    }

    function showChart(weights, dates) {
        console.log("Weights List : ", weights);
        console.log("Dates List : ", dates);
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: 'Your weight',
                    backgroundColor: 'red',
                    borderColor: 'green',
                    data: weights,
                    fill: false,
                }, ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Your weight chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Dates'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Weights'
                        },
                        ticks: {
                            stepSize: 20,
                            unitStepSize: 15,
                        },
                    }]
                }
            }
        });
    }
</script>