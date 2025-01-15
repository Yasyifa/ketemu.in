<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: 300px;
            border-radius: 8px;
            margin-top: 20px;
            object-fit: cover;
        }

        /* Comments Section */
        .comments-section {
            margin-top: 0px;
        }

        .comment, .reply {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            background-color: #fafafa;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .comment .avatar, .reply .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .comment .avatar img, .reply .avatar img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
        }

        .comment .content, .reply .content {
            flex: 1;
        }

        .comment .comment-author, .reply .comment-author {
            font-weight: bold;
            color: #333;
        }

        .comment .comment-time, .reply .comment-time {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        .comment-form, .reply-form {
            margin-top: 12px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            resize: vertical;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .reply-toggle {
            color: #007bff;
            cursor: pointer;
            margin-top: 10px;
        }

        .image-wrapper {
            width: 30%;
            height: 300px; /* Tentukan tinggi yang diinginkan */
            overflow: hidden; /* Potong gambar yang meluap */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Menjaga proporsi gambar */
        }

        /* Back Button */
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 28px;
            }

            p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $item->item_name }}</h1>
        <p><strong>Description:</strong> {{ $item->description }}</p>
        <p><strong>Phone Number:</strong> {{ $item->phone_number }}</p>
        <p><strong>Location:</strong> {{ $item->current_location ?? $item->last_location }}</p>
        
        @if($item->image)
            <div class="image-wrapper">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->item_name }}" style="max-width: 100%; height: auto;">
            </div>
        @endif

        @if($item->image_path) 
            <div class="image-wrapper">
                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->item_name }}" style="max-width: 100%; height: auto;">
            </div>
        @endif

        <!-- Back Button -->
        <a href="{{ route('home') }}" class="back-button">Back to Home</a>

        <div class="comments-section">
            <h2>Comments</h2>

            <!-- Loop untuk menampilkan komentar -->
            @foreach($comments as $comment)
                <div class="comment">
                    <div class="avatar">
                        <img src="{{ asset('storage/' . $comment->user->profile_picture) }}" alt="User Avatar">
                    </div>
                    <div class="content">
                        <p class="comment-author">{{ $comment->user->name }}</p>
                        <p>{{ $comment->comment }}</p>
                        <p class="comment-time">Posted on {{ $comment->created_at->format('d M Y, H:i') }}</p>

                        <!-- Loop untuk menampilkan balasan komentar -->
                        <div class="replies-container">
                            @foreach($comment->replies as $reply)
                                <div class="reply">
                                    <div class="avatar">
                                        <img src="{{ asset('storage/' . $reply->user->profile_picture) }}" alt="User Avatar">
                                    </div>
                                    <div class="content">
                                        <p class="comment-author">{{ $reply->user->name }}</p>
                                        <p>{{ $reply->comment }}</p>
                                        <p class="comment-time">Posted on {{ $reply->created_at->format('d M Y, H:i') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Tautan untuk melihat balasan -->
                        @if($comment->replies->count() > 0)
                            <span class="reply-toggle">Lihat balasan ({{ $comment->replies->count() }})</span>
                        @endif

                        <!-- Form untuk balasan komentar -->
                        @auth
                            <form action="{{ route('comments.reply', $comment->id) }}" method="POST" class="reply-form">
                                @csrf
                                <textarea name="comment" placeholder="Write a reply..." required></textarea>
                                <button type="submit">Balas</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach

            <!-- Form untuk menambahkan komentar baru -->
            @auth
                <h3>Tambahkan komentar</h3>
                <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="hidden" name="item_type" value="{{ get_class($item) }}">
                    <textarea name="comment" placeholder="Tulis komentar..." required></textarea>
                    <button type="submit">Kirim</button>
                </form>
            @endauth
        </div>
    </div>

    <script>
        // Script untuk toggle balasan komentar
        document.querySelectorAll('.reply-toggle').forEach(function(button) {
            button.addEventListener('click', function() {
                const repliesContainer = this.closest('.comment').querySelector('.replies-container');
                const isVisible = repliesContainer.style.display === 'block';
                repliesContainer.style.display = isVisible ? 'none' : 'block';
                this.textContent = isVisible ? 'View replies' : 'Hide replies';
            });
        });
    </script>
</body>
</html>
