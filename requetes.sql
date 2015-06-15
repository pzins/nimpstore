---nombre d'achat max et nom, prenom du client
SELECT count(*) som, c.nom n, c.prenom p, c.login l
FROM transaction t, client c
WHERE t.acheteur = c.login
GROUP by c.nom, c.prenom, c.login
ORDER BY som DESC
LIMIT 1;

---somme, avg et nb d'achat pour chaque client
SELECT c.nom, c.prenom, sum(t.montanttotal), avg(t.montanttotal), count(*)
from client c, transaction t
WHERE c.login=t.acheteur
GROUP BY c.nom, c.prenom;

---prix moyen, nb et somme des cadeaux reçus
SELECT c.nom, c.prenom, sum(t.montanttotal), avg(t.montanttotal), count(*)
from client c, transaction t
WHERE c.login=t.destinateur
GROUP BY c.nom, c.prenom;


---personne qui a le plus recus de cadeaux
SELECT p.nom, p.prenom
from
  (SELECT c.nom, c.prenom, sum(t.montanttotal), avg(t.montanttotal), count(*) nb
   from client c, transaction t
   WHERE c.login=t.destinateur
   GROUP BY c.nom, c.prenom) p
ORDER BY p.nb
LIMIT 1;

---personne qui n'a jamais acheté de cadeaux
SELECT c.nom, c.prenom, c.login
from client c LEFT OUTER JOIN transaction t
  on t.acheteur=c.login
WHERE t.acheteur ISNULL;


---ensemble des contenus qui n'ont pas été achetés par le client 'aaa'
SELECT c.titre, c.description
from contenu c
WHERE c.titre not in
      (

select c.titre
from contenu c, dureeacces d, transaction t, client cl
where c.id=d.idcontenu and d.numtransaction=t.num
      AND (t.acheteur = cl.login or t.destinateur = cl.login)
      and cl.login = 'aaa'
      );
