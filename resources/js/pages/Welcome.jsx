export default function Welcome({ pesan }) {
  return (
    <div className="bg-black text-white w-full h-screen flex flex-col justify-center items-center">
      <h1 className="font-bold text-2xl">Halaman React Pertama</h1>
      <p className="mt-4">Pesan : <span className="text-yellow-200 italic">{pesan}</span></p>
    </div>
  );
}
