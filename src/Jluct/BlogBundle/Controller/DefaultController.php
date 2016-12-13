<?php

namespace Jluct\BlogBundle\Controller;

use Jluct\BlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $data = $this->getDoctrine()->getRepository("JluctBlogBundle:Post")->findAll();

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery("SELECT u FROM JluctBlogBundle:Category u");
        $category = $query->getResult();

        return $this->render('blog/index.html.twig', ['data' => $data, 'category' => $category]);
    }

    public function getArticleAction($id)
    {
        $article = $this->getDoctrine()->getRepository('JluctBlogBundle:Post')->find($id);
        $category = $article->getCategory();

        return $this->render('blog/article.html.twig', ['article' => $article, 'category' => $category]);
    }

    public function getCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $articles  = $em->getRepository("JluctBlogBundle:Post")->findBy(['category' => $id]);
        $category = $em->getRepository("JluctBlogBundle:Category")->find($id);

        return $this->render('blog/category.html.twig', ['articles' => $articles, 'category' => $category]);

    }

    public function addArticleAction()
    {
        $date = new \DateTime('now');

        $post = new Post();
        $post->setTitle('Статья от ' . $date->format('d-m-Y H:II:s'));
        $post->setArticle('<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis culpa, cum cupiditate delectus dignissimos
    dolorum earum eos fugit harum magnam nostrum optio quo recusandae soluta sunt temporibus ullam veritatis voluptates.
</div>
<div>Accusantium explicabo impedit ipsam nam. Accusantium adipisci commodi consectetur distinctio ducimus eos et eveniet
    exercitationem hic in, laborum libero magnam maxime nemo, omnis quia recusandae reiciendis repellendus sunt vitae
    voluptatum.
</div>');

        $post->setCreated($date);

        $category = $this->getDoctrine()->getRepository('JluctBlogBundle:Category')->find(2);

        $post->setCategory($category);

        $em = $this->getDoctrine()->getManager();

        $em->persist($post);
        $em->flush();

        return $this->redirectToRoute('jluct_blog_homepage');
    }
}

?>

