<?php

namespace App\DataFixtures;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $lesMiserables = new Book();
        $lesMiserables->setNbrpages(1232);
        $lesMiserables->setTitle("Les misérables");
        $lesMiserables->addAuthor($this->getReference(AuthorFixtures::VICTOR_HUGO_AUTHOR_REFERENCE, Author::class));
        $manager->persist($lesMiserables);

        $mobydick = new Book();
        $mobydick->setNbrpages(635);
        $mobydick->setTitle("Moby-dick");
        $mobydick->addAuthor($this->getReference(AuthorFixtures::HERMAN_MELVIL_AUTHOR_REFERENCE, Author::class));
        $manager->persist($mobydick);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            AuthorFixtures::class,
        ];
    }
}
