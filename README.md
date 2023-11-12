### Docker

	install docker
	Docker Desktop
	add file sharing docker
	settings/resources/File sharing
	folder path /var/www/api
	docker compose up -d
### start
	docker exec -it api_app bash
	composer install

### env 

	create .env file and copy env-example

### Calling methods
    getUsers => /users
    getUserPosts => /users/{id}/posts
    getUserTodos => /users/{id}/todos

    getPosts => /posts
    getPostsUser => /posts?userId={id}
    getPost => /posts/{id}
	
    createPost => /posts/create?title={$title}&body={$body}&userId={userId}
    editPost => /posts/edit?id={id}&title={$title}&body={$body}&userId={userId}
    deletePost => /posts/delete?id={id}