export default function Home({ pesan }) {
  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4">
      <div className="bg-white p-8 rounded-lg shadow-sm text-center">
        <h1 className="text-3xl font-bold text-gray-800">
          Halaman Home
        </h1>

        <p className="mt-4 text-gray-600">
          Pesan: <span className="font-medium text-blue-600">{pesan}</span>
        </p>
      </div>
    </div>
  );
}