<?php include_once("header.php"); ?>

<section ng-controller="despesas-controller">

	<div class="container">


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

</section>

<?php include_once("footer.php"); ?>

<script>

	angular.module("despesas-app", []).controller("despesas-controller", function($scope, $http) {

		$scope.despesas = [];

		$http({
			method: 'GET',
			url: 'despesas-lista'
		}).then(function successCallback(response) {

			$scope.despesas = response.data;

		}, function errorCallback(response) {

		});

		$http({
			method: 'GET',
			url: 'despesas-total'
		}).then(function successCallback(response) {

			$scope.total = response.data;

		}, function errorCallback(response) {

		});




	});
</script>