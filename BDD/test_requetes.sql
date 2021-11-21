-- ici on peut copier les requêtes SQL testées en indiquant si elles ont réussi ou échoué par exemple...

-- retourne tous les joueurs (OK)
SELECT * 
FROM joueur; 

-- retourne tous les noms de joueurs de l'équipe "LES BOSS" (OK)
SELECT joueur.nom_joueur 
FROM equipe, joueur 
WHERE equipe.id = joueur.id_equipe AND equipe.nom_equipe = "LES BOSS"; 

-- retourne tous les âges de joueurs en catégorie "Minimes" (OK)
SELECT joueur.age_joueur 
FROM joueur, equipe, categorie 
WHERE joueur.id_equipe = equipe.id AND equipe.id_categorie = categorie.id AND categorie.nom_categorie = "Minimes"; 