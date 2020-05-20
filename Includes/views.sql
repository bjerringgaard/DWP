-- View COMMENT AMOUNT VIEW
CREATE VIEW commentamountview AS
SELECT p.PostID, p.PostTitle, p.PostDesc, p.PostImage, p.PostLikes, p.PostTime, p.UserID, u.ProfilePic,
COUNT(*) AS CommentAmount
FROM comment c, post p, user u
WHERE p.PostID = c.PostID
AND u.UserID = p.UserID
GROUP BY c.PostID
ORDER BY CommentAmount DESC

-- VIEW ALL POSTS BY GIVEN USER 
CREATE VIEW Dashboard AS
SELECT p.PostTitle, p.PostDesc,u.UserName
FROM post p, user u
WHERE p.UserID = u.UserID
ORDER BY p.PostTime DESC