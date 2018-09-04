
var myApp = angular.module("myApp", []);

myApp.controller("categorieDonController", function ($scope) {
    $scope.CategorieDon = {
        id: 101,
        nomCategorieDon: "Électroménagé",
        description:"caractérise tous les appareils et outils utilisant l'électricité et destinés à assurer des besoins domestiques, par opposition aux outils et machines ",
        //tableau d'objets
        subjects: [{ name: 'Math', marks: 80 },
        { name: 'Anglais', marks: 70 },
        { name: 'Informatique', marks: 60 },
        { name: 'Système d\'exploitation', marks: 75 }
        ],

        //Mon controleur va utiliser la fonction fullName pour recuperer le nom complet de l'etudiant
        fullName: function () {
            //Variable objet etudiant
            // var studentObject;
            // studentObject=$scope.student;
            return "Votre Identifiant: " + $scope.student.id + " ,Votre nom: " + $scope.student.firstName
                + " ,Votre prenom: " + $scope.student.lastName + " ,Votre email: " + $scope.student.Email + " ,Vos frais de scolarité coute: " + $scope.student.fees + "$"
                + " ,Subjects Name: " + $scope.student.subjects.name + " ,Marks: " + $scope.student.subjects.marks;
            //return $scope.student.id+ " "+$scope.student.firstName+ " "+ $scope.student.lastName;
        }
    };
    

});


myApp.controller("resetController", function($scope){
    $scope.reset = function () {
        $scope.student.firstName = "tchoupo";
        $scope.student.lastName = "guy";
        $scope.student.Email = "gtchoupo@gmail.com";
    }
    $scope.reset();
});