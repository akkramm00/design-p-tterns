                        <html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php 
// Un singleton est une classe qui ne peut etre instancier qu'une seulel fois 
// On ne doit pas pouvoir faire de "new Singleton ()" ni cloner un objet déja créé.
// On travaillera toujours avec le meme objet , liberant de l'espace par rapport à un cas ou nous en créeerions un nouveau a chaque utilisation.

// Pour mettre en oeuvre ce type de classe , il faut rendre privés  ses methodes __construct et __clone.
// Il faut stocker sa propre instance dans une propriété static de la classe.
// fin , il est nécessiare de mettre en place une méthode qui l'instabciera seulement dans le cas ou elle ne l'a pas deja été, puis qui reoturnera son instance.
// EXEMPLE:

class logger
  {
    private static $instance; // on stocke l'instance singleton dans la ^propriété Instance
    private function __construct() {}
    private function __clone() {}  // le constructeur et la methode de clonage doivent egtre privées afin de ne pas pouvoir les instancier a nouiveau.

    public static function getInstance(): self // la methode static qui nous permet de générer l'instance unique de notre singleton ou la retourner si elle a déja été
    {
      if(!isset(static::$instance)) {
        static::$instance = new static;
      }
      return static::$instance;
    }
    public function logToFile(string $data): void
    {
      //code métier de votre Singleton, ici on loggerait les données fournies.
    }
  }
$logger1 = Logger::getInstance();
$logger2 = Logger::getInstance();

if ($logger1 ===$logger2) {
  echo "C'est bien le méme objet instancié une seule fois";
}

  // L'avantage principal du design Singleton est de liberer de la mémoire par l'instanciation d'un objet unique.
  // Les opérations lourdes peuvent alors etre effectuées une seule et unique fois .
  //==========================================================================
  
  // La connectio et la déconnaixion a la base de données est un exemple typique d'utilisation de ce patron de conception
 class PDOSingleton
   {
     private static PDO $instance;

     private function __construct() {}
     private function __clone() {}

     public static function getInstance(): PDO
     {
       if(!isset(self::$instyance)){
         self::$instance = new PDO("mysql:host=localhost;dbname=dbname; charset=utf8", "root", "");
       }
       return self::$instance;
     }
   }
   
$pdo = PDOSingleton::getInstance();

// UN autree avantage inhérent de Singleton est la possibilité de les instancier de n'importe ou.

// Une alternative: L INJECTION DE DEPENDANCE.
// Comme nous l'avons vu,le but d'un patron de depondance est de repondre a un besoin récurent de façon optiùmale.
// Puisque les Singletons avaient des limites et ne devaient pas etre utilisées dans toiutes les situation, il était alorslogique qu'un autre design pattern naisse afin de répondre à ce problème de fort couplage: l'injection de dépendance.


// Partons d'une application qui gère des utilisateurs, ces utilisateurs ont chacun une addresse, cette adresse est une composante de plusieurs cariables. Le développement sans patron de conception commencerait de la sotre.
class Adress
  {
    private $number;
    private $street;
    private $zipcode;
    private $city;

    public functiop __construct($number, $street, $zipcode, $city)
    {
    $this -> number = $number;
    $this -> street = $street;
    $this -> zipcode = $zipcode;
    $this -> city = $city;
    }
  }
class Person
  {
    private $address;

    public function __construct($number, $street, $zipcode, $city)
    {
      $this-> address = new Address(($number, $street, $zipcode, $city)
;    }
  }

$person = new Person(4, 'chemin du village', 11110, 'Narbonne city' );

// Le problème est que la class Person est étroitement liée à la class Adress,
// la xlasse Person est meme inutilisable sans la classe Adress. De plus , imaginons que l'on souhaite ajouter une variable à la calsse Address, par exemple $country, il faudre aussi modifier le construcyteur de la calsse Person et lui ajouter un parametre. La solution pour eviter toutes ses manipulations est l'injection de dépendance.

class Person
  {
    private £address;
    public function __construct(Adress $address)
    {
      $this-> address = $address;
    }
  }
?> 


  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>