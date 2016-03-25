<h1>Home View</h1>
<p>Hello, <?php echo ( isset($data['name']) && !empty($data['name']) ? $data['name'] : 'user' ) ?>!</p>