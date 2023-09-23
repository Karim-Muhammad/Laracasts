> this branch i did it with myself to try this approach which mentioned below

In this Refactoring, I was trying to add more difficulty layer
I was trying to make one Endpoint to execute ONE Controller with different Request Types

in this case we made file `show.php` accepts `GET`, `POST` and `DELETE` requests (but not `PUT` i hadn't started with it yet)
in controller `show.php` depend on `$Method` variable we execute different functions in one controller!

There may potentially be a problem with this approach, like for example, user manipulate `<input type="hidden" name="_method" value="<DANGER>" />`
maybe delete button user change it to something else, like `GET` or `POST` and it will execute the function `GET` or `POST` instead of `DELETE` function
because i depend on this hidden value rather than the request type of Form


hmm, i think i should make it more secure, i will think about it later maybe



#### Summary
i did one endpoint to execute different functions in one controller, depend on the request type of hidden value _method first, if null, so request type of form

CONS
- Messy Code in this controller
- i think it's not secure enough, i should think about it later
- i think it's not good to make one endpoint to execute different functions in one controller, i should make different endpoints for each function

if you have any idea, please tell me, i will be happy to hear it from you
