<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMC - Reset Password</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <script src="https://cdn.tailwindcss.com/3.4.3"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/pmc-ico.png">
</head>
<body>
    <div class="flex min-h-full flex-col justify-center px-6 py-32 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="../images/logo.png" alt="Your Company">
        <!-- <h2 class="mt-4 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2> -->
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/forgot-password" method="POST">
            <?php if(isset($_SESSION['success'])): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative message-alert" role="alert">
                    <!-- <strong class="font-bold">Holy smokes!</strong> -->
                    <span class="block sm:inline"><?= $_SESSION['success'] ?></span>
                    <span onclick="removeMessage()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            <?php unset($_SESSION['success']); endif; ?>
            <div class="mb-4 text-sm text-gray-600">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" class="h-10 border mt-1 rounded px-2 w-full bg-trasparent <?= isset($errors['email']) ? 'border-red-500' : '' ?>" value="<?= old('email') ?>">
                </div>
                <?php if(isset($errors['email'])): ?>
                    <span class="text-red-500 text-xs"><?= $errors['email'] ?></span>
                <?php endif; ?>
            </div>
<!-- 
            <div>
                <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                <div class="text-sm">
                    <a href="/forgot-password" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" class="h-10 border mt-1 rounded px-2 w-full bg-trasparent <?= isset($errors['password']) ? 'border-red-500' : '' ?>">
                </div>
                <?php if(isset($errors['password'])): ?>
                    <span class="text-red-500 text-xs"><?= $errors['password'] ?></span>
                <?php endif; ?>
            </div> -->

            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-gray-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-800">EMAIL PASSWORD RESET LINK</button>
            </div>
        </form>
<!-- 
        <p class="mt-10 text-center text-sm text-gray-500">
        Not a member?
        <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Start a 14 day free trial</a>
        </p> -->
    </div>
    </div>
    <script>
        function removeMessage() {
            document.querySelector('.message-alert').remove()
        }
        function removeResponseMessage(element) {
            // console.log(element.parentNode)
            element.parentNode.classList.add('hidden')
        }
    </script>
</body>
</html>