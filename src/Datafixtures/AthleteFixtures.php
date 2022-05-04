<?php

namespace App\DataFixtures;

use App\Entity\Athlete;
use App\Repository\AthleteRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AthleteFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tabathlete = [];
        $tabathlete = [
            /*  Allemagne
                Femme
            */
            ["denise", "herrman", "Femme", "Allemagne", 589],
            ["vanessa", "voigt", "Femme", "Allemagne", 522],
            ["franziska", "preuss", "Femme", "Allemagne", 357],
            ["franziska", "hildebrand", "Femme", "Allemagne", 304],
            ["vanessa", "hinz", "Femme", "Allemagne", 262],
            ["janina", "hettich", "Femme", "Allemagne", 161],
            ["anna", "weidel", "Femme", "Allemagne", 72],


            /*  Autriche
                Femme
            */
            ["lisa theresa", "hauser", "Femme", "Autriche", 684],
            ["dunja", "zdouc", "Femme", "Autriche", 136],
            ["julia", "schwaiger", "Femme", "Autriche", 34],
            ["katharina", "innerhofer", "Femme", "Autriche", 10],
            ["christina", "rieder", "Femme", "Autriche", 5],


            /*  Bélarus
                Femme
            */
            ["dzinara", "alimbekava", "Femme", "Bélarus", 589],
            ["hanna", "sola", "Femme", "Bélarus", 420],
            ["iryna", "leschanka", "Femme", "Bélarus", 67],
            ["elena", "kruchinkina", "Femme", "Bélarus", 53],
            ["alina", "pilchuk", "Femme", "Bélarus", 1],


            /*  Belgique
                Femme
            */
            ["lie", "lotte", "Femme", "Belgique", 258],


            /*  Bulgarie
                Femme
            */
            ["milena", "todorova", "Femme", "Bulgarie", 97],


            /*  Canada
                Femme
            */
            ["emma", "lunder", "Femme", "Canada", 66],
            ["nadia", "moser", "Femme", "Canada", 21],
            ["megan", "bankes", "Femme", "Canada", 8],
            ["sarah", "beaudry", "Femme", "Canada", 2],


            /*  Chine 
                Femme
            */
            ["yuanmeng", "chu", "Femme", "Chine", 37],
            ["fanqi", "meng", "Femme", "Chine", 36],
            ["yan", "zhang", "Femme", "Chine", 25],
            ["jialin", "tang", "Femme", "Chine", 12],


            /*  Corée du Sud 
                Femme
            */
            ["ekaterina", "avvakumova", "Femme", "Corée du Sud", 27],


            /*  Estonie
                Femme
            */
            ["tuuli", "tomingas", "Femme", "Estonie", 100],
            ["regina", "oja", "Femme", "Estonie", 15],
            ["johanna", "talihaerm", "Femme", "Estonie", 7],


            /*  Finlande
                Femme
            */
            ["mari", "eder", "Femme", "Finlande", 260],
            ["suvi", "minkkinen", "Femme", "Finlande", 148],
            ["nastassia", "kinnunen", "Femme", "Finlande", 43],


            /*  France
                Femme
            */
            ["anais", "chevalier-bouchet", "Femme", "France", 642],
            ["justine", "braisaz-bouchet", "Femme", "France", 581],
            ["julia", "simon", "Femme", "France", 554],
            ["anais", "bescond", "Femme", "France", 515],
            ["chloe", "chevalier", "Femme", "France", 314],
            ["paula", "botet", "Femme", "France", 25],
            ["caroline", "colombo", "Femme", "France", 20],
            ["lou", "jeanmonnot", "Femme", "France", 10],


            /*  Grande-Bretagne
                Femme
            */
            ["amanda", "lightfoot", "Femme", "Grande-Bretagne", 21],


            /*  Italie
                Femme
            */
            ["dorothea", "wierer", "Femme", "Italie", 577],
            ["lisa", "vittozzi", "Femme", "Italie", 246],
            ["federica", "sanfilippo", "Femme", "Italie", 33],
            ["samuela", "comola", "Femme", "Italie", 18],


            /*  Japon
                Femme
            */
            ["fuyuko", "tachizaki", "Femme", "Japon", 79],
            ["sari", "maeda", "Femme", "Japon", 22],


            /*  Kazakhstan 
                Femme
            */
            ["galina", "vishnevskaya-sheporenko", "Femme", "Kazakhstan", 40],
            ["darya", "klimina", "Femme", "Kazakhstan", 15],
            ["yelizaveta", "belchenko", "Femme", "Kazakhstan", 14],


            /*  Lettonie
                Femme
            */
            ["baiba", "bendika", "Femme", "Lettonie", 152],


            /*  Lituanie
                Femme
            */
            ["gabriele", "lescinskaite", "Femme", "Lituanie", 22],


            /*  Moldavie
                Femme
            */
            ["alina", "stremous", "Femme", "Moldavie", 153],


            /*  Norvège
                Femme
            */
            ["marte olsbu", "roeiseland", "Femme", "Norvège", 957],
            ["tiril", "eckhoff", "Femme", "Norvège", 555],
            ["ingrid landmark", "tandrevold", "Femme", "Norvège", 470],
            ["karoline offigstad", "knotten", "Femme", "Norvège", 249],
            ["ida", "lien", "Femme", "Norvège", 187],
            ["emilie aagheim", "kalkenberg", "Femme", "Norvège", 81],
            ["karoline", "erdal", "Femme", "Norvège", 61],
            ["ragnhild", "femsteinevik", "Femme", "Norvège", 46],


            /*  Pologne
                Femme
            */
            ["monika", "hojnisz-starega", "Femme", "Pologne", 153],
            ["kamila", "zuk", "Femme", "Pologne", 41],
            ["anna", "maka", "Femme", "Pologne", 37],


            /*  Roumanie 
                Femme
            */
            ["natalia", "ushkina", "Femme", "Roumanie", 28],


            /*  Russie
                Femme
            */
            ["kristina", "reztsova", "Femme", "Russie", 366],
            ["uliana", "nigmatullina", "Femme", "Russie", 285],
            ["svetlana", "mironova", "Femme", "Russie", 197],
            ["irina", "kazakevich", "Femme", "Russie", 189],
            ["valeriia", "vasnetcova", "Femme", "Russie", 153],
            ["larisa", "kuklina", "Femme", "Russie", 18],


            /*  Slovaquie
                Femme
            */
            ["paulina", "fialkova", "Femme", "Slovaquie", 305],
            ["ivona", "fialkova", "Femme", "Slovaquie", 94],


            /*  Slovènie
                Femme
            */
            ["polona", "klemencic", "Femme", "Slovènie", 8],


            /*  Suède
                Femme
            */
            ["elvira", "oeberg", "Femme", "Suède", 823],
            ["hanna", "oeberg", "Femme", "Suède", 661],
            ["mona", "brorsson", "Femme", "Suède", 442],
            ["linn", "persson", "Femme", "Suède", 416],
            ["stina", "nilsson", "Femme", "Suède", 249],
            ["anna", "magnusson", "Femme", "Suède", 207],
            ["emma", "nilsson", "Femme", "Suède", 18],
            ["johanna", "skottheim", "Femme", "Suède", 9],


            /*  Suisse
                Femme
            */
            ["lena", "haecki", "Femme", "Suisse", 240],
            ["elisa", "gasparin", "Femme", "Suisse", 71],
            ["aita", "gasparin", "Femme", "Suisse", 69],
            ["amy", "baserga", "Femme", "Suisse", 33],
            ["selena", "gasparin", "Femme", "Suisse", 7],


            /*  Tchéquie
                Femme
            */
            ["marketa", "davidova", "Femme", "Tchéquie", 560],
            ["jessica", "jislova", "Femme", "Tchéquie", 441],
            ["tereza", "vobornikova", "Femme", "Tchéquie", 40],
            ["lucie", "charvatova", "Femme", "Tchéquie", 33],
            ["eva", "puskarcikova", "Femme", "Tchéquie", 30],
            ["tereza", "vinklarkova", "Femme", "Tchéquie", 12],
            ["eliska", "tepla", "Femme", "Tchéquie", 5],


            /*  Ukraine
                Femme
            */
            ["yuliia", "dzhima", "Femme", "Ukraine", 153],
            ["olena", "bilosiuk", "Femme", "Ukraine", 103],
            ["darya", "blashko", "Femme", "Ukraine", 72],
            ["valentina", "semerenko", "Femme", "Ukraine", 60],
            ["iryna", "petrenko", "Femme", "Ukraine", 17],
            ["anastasiya", "merkushyna", "Femme", "Ukraine", 4],


            /*  USA
                Femme
            */
            ["egan", "clare", "Femme", "USA", 120],
            ["deedra", "irwin", "Femme", "USA", 61],
            ["susan", "dunklee", "Femme", "USA", 31],
            ["joanne", "reid", "Femme", "USA", 24],


        ];

        foreach ($tabathlete as list($firstName, $lastName, $gender, $country, $total21)) {
            $athlete = new Athlete();
            $athlete
                ->setFirstName($firstName)
                ->setLastName($lastName)
                ->setTotal2021($total21)
                ->setGender($this->getReference($gender))
                ->setCountry($this->getReference($country));
            $manager->persist($athlete);
        }
        unset($tabathlete, $firstName, $lastName, $gender, $country, $athlete);

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}
