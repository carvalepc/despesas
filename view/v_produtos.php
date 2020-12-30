<?php include_once("header.php"); ?>

<section>

	<div class="container" id="lista-produtos-container" ng-controller="produtos-controller">

		<div id="lista-produtos">

			<div class="item" ng-repeat="produto in produtos">

				<div class="col-md-2 col-1">

					<span>{{produto[0]}}</span>
				

				</div>

				<div class="col-md-6 col-2">
			
						<span>{{produto.nome_prod_curto}}<span>					
				</div>

				<div class="col-md-4 col-3">
						<span>{{produto.preco}}</span>					
				</div>

			</div>

</section>

<?php include_once("footer.php"); ?>

<script>

	angular.module("shop", []).controller("produtos-controller", ($scope, $http) => {

		$scope.produtos = [];

		$http({
			method: 'GET',
			url: 'l_produtos'
		}).then(function successCallback(response) {

			//console.log("Sucesso");
			//console.log(response);
			$scope.produtos = response.data;


		}, function errorCallback(response) {
			// called asynchronously if an error occurs
			// or server returns response with an error status.
		});

	});
</script>