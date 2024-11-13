<?php
/**
 * 
 */


/**
 * Une classe pour representer les recettes de cuisines
 */
class Recette
{
    private int|null $id;
    private string|null $nom;
    private string|null $description;
    private string|null $image;
    private ?Categorie $categorie;
    private ?array $ingredientQuantifies; //[objet ingrédient_quantifié],

    /**
     * Constructeur de la classe Recette
     *
     * @param integer|null $id L'identifiant de la Recette
     * @param string|null $nom Nom de la Recette
     * @param string|null $description Description de la Recette
     * @param string|null $image Chemin d'accès de la Recette
     * @param Categorie|null $categorie La Categorie de la recette : entrée, plat, dessert
     * @param array|null $ingredientQuantifies La quantité d'Ingredient
     */
    public function __construct(?int $id = null, ?string $nom = null, ?string $description = null, ?string $image = null, ?Categorie $categorie = null, ?array $ingredientQuantifies = null)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setDescription($description);
        $this->setImage($image);
        $this->setCategorie($categorie);
        $this->setIngredientQuantifies($ingredientQuantifies);
    }


    /**
     * Getteur de l'id de la Recette
     *
     * @return integer|null La valeur de l'id de la Recette
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): void
    {
        $this->nom = $nom;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): void
    {
        $this->categorie = $categorie;
    }

    public function getIngredientQuantifies(): ?array
    {
        if ($this->ingredientQuantifies == null)
        {
            $db = Bd::getInstance();
            $pdo = $db->getConnection();
            $manager = new IngredientQuantifieDao($pdo);
            $this->ingredientQuantifies = $manager->findIngredientQuantifieByRecette($this->id);
        }
        return $this->ingredientQuantifies;
    }

    public function setIngredientQuantifies(?array $ingredientQuantifies): void
    {
        $this->ingredientQuantifies = $ingredientQuantifies;
    }
}
