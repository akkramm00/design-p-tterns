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

?> 


  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>