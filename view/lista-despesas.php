<?php include_once("header.php"); ?>

<section ng-controller="despesas-controller">

    <div class="container-fluid">
        </br>
        <form>
            <div class="form-group row">
                <div class="col-xs-2">
                    <input type="date" name="seldata" ng-model="seldata" class="form-control" />
                </div>
                <div class="col-xs-2">
                    <input type="submit" name="btnInsert" class="btn btn-primary" ng-click="searchData()" value="PROCURAR" />
                </div>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Banco</th>
                    <th>Descrição</th>
                    <th>Valor</th>

                </tr>
            </thead>
            <tbody>
                <tr class="lead" ng-repeat="despesa in despesas">
                    <td>{{despesa.Data}}</td>
                    <td>{{despesa.Banco}}</td>
                    <td>{{despesa.Descricao}}</td>
                    <td>{{despesa.Valor}}</td>
                </tr>

            </tbody>
        </table>

        <div>
            <h2 class="lead" ng-repeat="valor in total">Total : <strong>{{valor.Total}}</strong> </h2>
        </div>


    </div>

    <tt> Data = {{seldata| date: "dd-MM-yyyy" }}</tt><br />
</section>


<?php include_once("footer.php"); ?>

<script>
    angular.module("despesas-app", []).controller("despesas-controller", function($scope, $http) {

        $scope.seldata = new Date();

        $scope.searchData = function() {

            let d = ($scope.seldata);
            let d_link1 = 'search-'+d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
            let d_link2 = 'dtotal-'+d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();

            console.log(d_link1);
            console.log(d_link2);
            //console.log(angular.isDate(d));

            $scope.despesas = [];

            $http({
                method: 'GET',
                url: d_link1
            }).then(function successCallback(response) {

                $scope.despesas = response.data;

            }, function errorCallback(response) {

            });

            $http({
                method: 'GET',
                url: d_link2
            }).then(function successCallback(response) {

                $scope.total = response.data;

            }, function errorCallback(response) {

            });

        };

    });
</script>