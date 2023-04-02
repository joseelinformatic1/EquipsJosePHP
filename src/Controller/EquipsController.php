<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipsController
{
    private $equips = array(
        array("codi" => 1, "nom" => "Salvador Sala",
            "telefon" => "638961244", "email" => "salvasala@simarro.org"),
        array("codi" => 2, "nom" => "Anna Llopis",
            "telefon" => "669332004", "email" => "annallopis@simarro.org"),
        array("codi" => 3, "nom" => "Marc Sanchis",
            "telefon" => "962286040", "email" => "marcsanchis@simarro.org"),
        array("codi" => 4, "nom" => "Laura Palop",
            "telefon" => "663568890", "email" => "laurapalop@simarro.org"),
        array("codi" => 5, "nom" => "Sara Sidle",
            "telefon" => "638765434", "email" => "sarasidle@simarro.org"),);
    #[Route('/equips/{codi<\d+>?1}' ,name:'fitxa_equip')]
    public function fitxa($codi)
    {
        $resultat = array_filter($this->equips,
            function($equip) use ($codi)
            {
                return $equip["codi"] == $codi;
            });
        if (count($resultat) > 0)
        {
            $resposta = "";
            $resultat = array_shift($resultat); #torna el primer element
            $resposta .= "<ul><li>" . $resultat["nom"] . "</li>" .
                "<li>" . $resultat["telefon"] . "</li>" .
                "<li>" . $resultat["email"] . "</li></ul>";
            return new Response("<html><body>$resposta</body></html>");
        }
        else
            return new Response("No s’ha trobat l’equip: $codi");
    }

    #[Route('/equips/{text}' ,name:'buscar_equip')]
    public function buscar($text)
    {
        $resultat = array_filter($this->equips,
            function($equip) use ($text)
            {
                return strpos($equip["nom"], $text) !== FALSE;
            });
        $resposta = "";
        if (count($resultat) > 0)
        {
            foreach ($resultat as $equip)
                $resposta .= "<ul><li>" . $equip["nom"] . "</li>" .
                    "<li>" . $equip["telefon"] . "</li>" .
                    "<li>" . $equip["email"] . "</li></ul>";
            return new Response("<html><body>" . $resposta .
                "</body></html>");
        }
        else
            return new Response("No s'han trobat equips");
    }
}
